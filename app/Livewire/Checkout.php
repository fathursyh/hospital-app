<?php

namespace App\Livewire;

use App\AlertEnum;
use App\HospitalTypeEnum;
use App\Models\Plan;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Checkout extends Component
{
    // Step management
    public $currentStep = 1;
    public $totalSteps = 3;

    public $selectedPlan = null;

    // Step 1: Personal Information
    public $hospitalName = '';

    public $hospitalLicense = '';
    public $hospitalType = HospitalTypeEnum::Private;

    public $phone = '';

    // Step 2: Address Information

    public $address = '';
    public $website = '';
    // Step 3: Payment Information


    // Progress tracking
    public $userProgress = [];
    public $plans = [];
    public function mount()
    {
        // Initialize progress tracking
        $this->userProgress = [
            'step1_completed' => false,
            'step2_completed' => false,
            'step3_completed' => false,
            'form_data' => []
        ];
        $this->plans = Plan::all();
    }

    public function selectPlan($id) {
        $this->selectedPlan = $id;
    }

    public function nextStep()
    {
        $this->validateCurrentStep();

        if ($this->currentStep < $this->totalSteps) {
            $this->markStepCompleted($this->currentStep);
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function goToStep($step)
    {
        if ($step >= 1 && $step <= $this->totalSteps) {
            // Only allow going to a step if previous steps are completed
            if ($step <= $this->currentStep || $this->canAccessStep($step)) {
                $this->currentStep = $step;
            }
        }
    }

    private function canAccessStep($step)
    {
        // Check if user can access the step based on completed previous steps
        for ($i = 1; $i < $step; $i++) {
            if (!$this->userProgress["step{$i}_completed"]) {
                return false;
            }
        }
        return true;
    }

    private function validateCurrentStep()
    {
        switch ($this->currentStep) {
            case 1:
                if (!auth()->user()) {
                    return redirect()->route('login')->with([
                        'status' => AlertEnum::Info->value,
                        'message' => 'You must logged in to proceed.'
                    ]);
                }
                $this->validate([
                    // form 1
                    'hospitalName' => 'required|string|max:255',
                    'hospitalLicense' => 'required|string|max:255',
                    'hospitalType' => ['required', new Enum(HospitalTypeEnum::class)],
                    'phone' => 'required|string|regex:/^[0-9+\-\s()]{7,20}$/',
                ]);
                break;

            case 2:
                $this->validate([
                    // form 2
                    'address' => 'required|string|max:255',
                    'website' => 'string|max:255|nullable'
                ]);
                break;

            case 3:
                $this->validate([
                    // form 3
                ]);
                break;
        }
    }

    private function markStepCompleted($step)
    {
        $this->userProgress["step{$step}_completed"] = true;

        // Save current step data
        $this->saveStepData($step);

        // Dispatch event for step completion
        $this->dispatch('step-completed', ['step' => $step]);
    }

    private function saveStepData($step)
    {
        switch ($step) {
            case 1:
                $this->userProgress['form_data']['company'] = [
                    'hospitalName' => $this->hospitalName,
                    'hospitalLicense' => $this->hospitalLicense,
                    'hospitalType' => $this->hospitalType,
                    'phone' => $this->phone,
                ];
                break;

            case 2:
                $this->userProgress['form_data']['address'] = [

                ];
                break;

            case 3:
                $this->userProgress['form_data']['payment'] = [

                ];
                break;
        }
    }

    public function submit()
    {
        // Validate final step
        $this->validateCurrentStep();

        // Mark final step as completed
        $this->markStepCompleted($this->currentStep);

        // Process the complete form data
        $this->processCheckout();

        // Redirect or show success message
        session()->flash('success', 'Checkout completed successfully!');

        // Reset form or redirect
        return redirect()->route('checkout.success');
    }

    private function processCheckout()
    {
        // Here you would typically:
        // 1. Save to database
        // 2. Process payment
        // 3. Send confirmation emails
        // 4. etc.

        $completeData = $this->userProgress['form_data'];

        // Example: Create order record
        // Order::create($completeData);

        // Example: Process payment
        // PaymentService::process($completeData['payment']);
    }

    #[Computed]
    public function StepTitle()
    {
        return match ($this->currentStep) {
            1 => 'Company Information',
            2 => 'Address Details',
            3 => 'Payment Information',
            default => 'Checkout'
        };
    }

    #[Computed]
    public function progressPercentage()
    {
        return (($this->currentStep - 1) / ($this->totalSteps - 1)) * 100;
    }

      #[Computed]
    public function plan()
    {
        return $this->plans->firstWhere('id', $this->selectedPlan);
    }
    public function render()
    {
        return view('livewire.checkout', [
            'stepTitle' => $this->stepTitle,
            'progressPercentage' => $this->progressPercentage,
            'hospitalEnum' => array_map(fn(HospitalTypeEnum $type) => $type->value, HospitalTypeEnum::cases()),
        ]);
    }
}

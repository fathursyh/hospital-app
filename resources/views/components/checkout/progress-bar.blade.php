<div class="mb-8">
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-900">{{ $stepTitle }}</h2>
        <span class="text-sm text-gray-500">Step {{ $currentStep }} of {{ $totalSteps }}</span>
    </div>
    <div class="h-2 w-full rounded-full bg-gray-200">
        <div class="h-2 rounded-full bg-blue-600 transition-all duration-300" style="width: {{ $progressPercentage }}%">
        </div>
    </div>

    <!-- Step indicators -->
    <div class="mt-4 flex justify-between">
        @for ($i = 1; $i <= $totalSteps; $i++)
            <div class="flex items-center">
                <button
                    wire:click="goToStep({{ $i }})"
                    class="@if ($i < $currentStep || $userProgress['step' . $i . '_completed']) bg-green-500 text-white @elseif($i == $currentStep)
                    bg-blue-600 text-white @else bg-gray-300 text-gray-600 @endif flex h-8 w-8 items-center justify-center rounded-full text-sm font-medium">
                    @if ($i < $currentStep || $userProgress['step' . $i . '_completed'])
                        ✓
                    @else
                        {{ $i }}
                    @endif
                </button>
                @if ($i < $totalSteps)
                    <div
                        class="@if ($i < $currentStep) bg-green-500 @else bg-gray-300 @endif mx-2 h-1 flex-1">
                    </div>
                @endif
            </div>
        @endfor
    </div>
</div>

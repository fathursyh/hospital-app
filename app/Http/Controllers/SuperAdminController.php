<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('superadmin.dashboard');
    }
    public function hospitals()
    {
        return view('superadmin.hospitals');
    }
    public function plans()
    {
        $plans = Plan::all(['id', 'name', 'price', 'features']);
        return view('superadmin.plans', compact('plans'));
    }
    public function edit(string $id)
    {
        $plan = Plan::find($id);
        return view('superadmin.plans-edit', compact('plan'));
    }
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
        ]);
        $features = array_filter($request->features, function ($feature) {
            return !empty(trim($feature));
        });

        $plan->update([
            'name' => $request->name,
            'price' => $request->price,
            'features' => array_values($features),
        ]);

        return redirect()->route('superadmin.plans')
            ->with([
                'status' => 'success',
                'message' => 'Plan has been updated successfully!'
            ]);
    }
}

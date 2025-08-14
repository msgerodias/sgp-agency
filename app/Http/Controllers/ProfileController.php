<?php

// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show the profile form (create or edit)
    public function edit()
    {
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('applicant.profile.edit', compact('profile'));
    }

    // Store new profile
    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'municipality_city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:20',
            'alternative_number' => 'nullable|string|max:20',
            'email_address' => 'nullable|email|max:255',
            'civil_status' => 'nullable|string|max:50',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_contact_number' => 'nullable|string|max:20',
            'highest_educational_attainment' => 'nullable|string|max:255',
            'is_ex_abroad' => 'boolean',
            'last_country' => 'nullable|string|max:255',
            'years_abroad' => 'nullable|integer',
            'application_type' => 'nullable|string|max:50',
            'earliest_availability' => 'nullable|date',
        ]);

        $validated['user_id'] = Auth::id();

        Profile::create($validated);

        return redirect()->route('dashboard')->with('success', 'Profile created successfully.');
    }

    // Update profile
    public function update(Request $request, Profile $profile)
    {
        //$this->authorize('update', $profile); // Optional if using policies

        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'municipality_city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:20',
            'alternative_number' => 'nullable|string|max:20',
            'email_address' => 'nullable|email|max:255',
            'civil_status' => 'nullable|string|max:50',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_contact_number' => 'nullable|string|max:20',
            'highest_educational_attainment' => 'nullable|string|max:255',
            'is_ex_abroad' => 'boolean',
            'last_country' => 'nullable|string|max:255',
            'years_abroad' => 'nullable|integer',
            'application_type' => 'nullable|string|max:50',
            'earliest_availability' => 'nullable|date',
        ]);

        $profile->update($validated);

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
    }
}

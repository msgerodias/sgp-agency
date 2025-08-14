<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\ProfileAttachment;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Get applicant profile
        $profile = Profile::where('user_id', $user->id)->first();

        // Determine if profile is complete
        $isProfileComplete = $profile && $this->checkProfileComplete($profile);

        // Required attachments
        $requiredAttachments = [
            'picture',
            'valid_ID_1',
            'valid_ID_2',
            'psa_birth_certificate',
            'passport',
            'medical',
            'vaccine'
        ];

        // Fetch user's attachments
        $attachments = ProfileAttachment::where('profile_id', optional($profile)->id)->get();

        // Fetch user's applications
        $applications = \App\Models\Application::where('user_id', $user->id)
            ->latest()
            ->get();

        // Check if user already applied
        $hasApplied = $applications->isNotEmpty();

        return view('dashboard', compact(
            'isProfileComplete',
            'profile',
            'requiredAttachments',
            'attachments',
            'applications',
            'hasApplied'
        ));
    }

    private function checkProfileComplete(Profile $profile)
    {
        // Check if all required fields are filled
        $requiredFields = [
            'last_name',
            'first_name',
            'middle_name',
            'birthdate',
            'gender',
            'street',
            'barangay',
            'municipality_city',
            'province',
            'contact_number',
            'civil_status',
            'highest_educational_attainment',
        ];

        foreach ($requiredFields as $field) {
            if (empty($profile->$field)) {
                return false;
            }
        }
        return true;
    }
}

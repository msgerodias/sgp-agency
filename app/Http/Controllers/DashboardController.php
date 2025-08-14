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

        // Get applicant profile
        $profile = Profile::where('user_id', $user->id)->first();

        // Determine if profile is complete
        $isProfileComplete = $profile && $this->checkProfileComplete($profile);

        // Required attachments
        $requiredAttachments = [
            'picture',
            'valid_id_1',
            'valid_id_2',
            'psa_birth_certificate',
            'passport',
            'medical',
            'vaccine'
        ];

        // Fetch user's attachments
        $attachments = ProfileAttachment::where('profile_id', optional($profile)->id)->get();

        return view('dashboard', compact(
            'isProfileComplete',
            'profile',
            'requiredAttachments',
            'attachments'
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

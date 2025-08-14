<?php

// app/Http/Controllers/ProfileAttachmentController.php
namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\ProfileAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileAttachmentController extends Controller
{
    // Store an attachment
    public function store(Request $request, Profile $profile)
    {
        $request->validate([
            'type' => 'required|string|max:50', // valid_id_1, passport, etc.
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $path = $request->file('file')->store('attachments', 'public');

        ProfileAttachment::create([
            'profile_id' => $profile->id,
            'type' => $request->type,
            'file_path' => $path,
        ]);

        return back()->with('success', 'Attachment uploaded successfully.');
    }

    // Delete an attachment
    public function destroy(ProfileAttachment $attachment)
    {
        if ($attachment->file_path && Storage::disk('public')->exists($attachment->file_path)) {
            Storage::disk('public')->delete($attachment->file_path);
        }

        $attachment->delete();

        return back()->with('success', 'Attachment removed successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'countries' => 'required|array|min:1',
            'earliest_fly_date' => 'required|date',
            'call_time' => 'required|string',
            'referred_by' => 'nullable|string|max:255',
        ]);

        Application::create([
            'user_id' => Auth::id(),
            'countries' => $request->countries,
            'earliest_fly_date' => $request->earliest_fly_date,
            'call_time' => $request->call_time,
            'referred_by' => $request->referred_by,
            'status' => 'For Review',
        ]);

        return redirect()->route('dashboard')
                         ->with('success', 'Application submitted successfully!');
    }
}

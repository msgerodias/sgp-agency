<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $applications = $status 
            ? Application::where('status', $status)->latest()->get() 
            : Application::latest()->get();

        return view('admin.applications.index', compact('applications', 'status'));
    }

    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $application->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('admin.applications.show', $application->id)
                         ->with('success', 'Application updated successfully.');
    }
}

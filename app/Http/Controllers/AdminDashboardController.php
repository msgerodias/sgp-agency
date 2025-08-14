<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $statusFilter = $request->query('status');

        $applications = Application::with(['user.profile'])
            ->when($statusFilter, function ($query, $statusFilter) {
                return $query->where('status', $statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.dashboard', compact('applications', 'statusFilter'));
    }

    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $application->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Application updated successfully.');
    }
}

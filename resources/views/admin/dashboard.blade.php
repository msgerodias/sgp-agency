<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="w-9/10 mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Status Filter -->
            <form method="GET" class="flex space-x-2">
                <select name="status" class="border rounded px-2 py-1">
                    <option value="">All Statuses</option>
                    <option value="For Review" @selected(request('status')=='For Review')>For Review</option>
                    <option value="Cancelled" @selected(request('status')=='Cancelled')>Cancelled</option>
                    <option value="Missing Requirements" @selected(request('status')=='Missing Requirements')>Missing Requirements</option>
                    <option value="Approved" @selected(request('status')=='Approved')>Approved</option>
                    <option value="In Process" @selected(request('status')=='In Process')>In Process</option>
                    <option value="For Training (Manila)" @selected(request('status')=='For Training (Manila)')>For Training (Manila)</option>
                    <option value="Waiting for Flight Schedule" @selected(request('status')=='Waiting for Flight Schedule')>Waiting for Flight Schedule</option>
                    <option value="Scheduled to Fly" @selected(request('status')=='Scheduled to Fly')>Scheduled to Fly</option>
                    <option value="Completed" @selected(request('status')=='Completed')>Completed</option>
                </select>
                <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Filter</button>
            </form>

            <!-- Applications Table -->
            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-xl p-6">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium">Date Applied</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Applicant</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Countries</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Earliest Availability</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Remarks</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $app)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-6 py-4">{{ $app->created_at->format('m-d-Y') }}</td>
                                <td class="px-6 py-4">
                                    {{ $app->user->profile->last_name ?? '-' }},
                                    {{ $app->user->profile->first_name ?? '' }}
                                    {{ $app->user->profile->middle_name ?? '' }}
                                </td>

                                @php
                                    $countries = is_array($app->countries)
                                        ? $app->countries
                                        : json_decode($app->countries, true);
                                @endphp
                                <td class="px-6 py-4">{{ implode(', ', $countries ?? []) }}</td>
                                <td class="px-6 py-4">{{ $app->earliest_fly_date }}</td>
                                <td class="px-6 py-4">{{ $app->status ?? 'For Review' }}</td>
                                <td class="px-6 py-4">{{ $app->remarks ?? '' }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.application.show', $app) }}"
                                       class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>

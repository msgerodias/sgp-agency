<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Applications') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6">
            <form method="GET" class="mb-4 flex items-center space-x-4">
                <label>Status Filter:</label>
                <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1">
                    <option value="">All</option>
                    @foreach(['For Review','Cancelled','Missing Requirements','Approved','In Process','For Training (Manila)','Waiting for Flight Schedule','Scheduled to Fly','Completed'] as $s)
                        <option value="{{ $s }}" {{ ($status ?? '') === $s ? 'selected' : '' }}>{{ $s }}</option>
                    @endforeach
                </select>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium">Applicant</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Countries</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Submitted</th>
                            <th class="px-6 py-3 text-left text-xs font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $app)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4">{{ $app->profile->user->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ implode(', ', json_decode($app->countries, true)) }}</td>
                            <td class="px-6 py-4">{{ $app->status }}</td>
                            <td class="px-6 py-4">{{ $app->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.applications.show', $app->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applicant Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Welcome & Personal Profile Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-xl p-6 md:p-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            Hello, {{ Auth::user()->name }}!
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            Welcome back to your application dashboard.
                        </p>
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2">
                            Profile Status:
                            @if($isProfileComplete)
                                <i class="fas fa-check-circle text-green-500 text-lg"></i>
                                <span class="text-sm font-medium text-green-700 dark:text-green-400">
                                    Completed ✅
                                </span>
                            @else
                                <i class="fas fa-exclamation-triangle text-yellow-500 text-lg"></i>
                                <span class="text-sm font-medium text-yellow-700 dark:text-yellow-400">
                                    Incomplete ❌
                                </span>
                            @endif
                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-md 
                                  hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-user-edit mr-2"></i> View / Update Profile
                        </a>
                    </div>
                </div>
            </div>

            <!-- Requirements Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-xl p-6 md:p-8">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6">
                    Required Attachments
                </h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium">Requirement</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium">Icon</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requiredAttachments as $type)
                                @php $uploaded = $attachments->firstWhere('type', $type); @endphp
                                <tr>
                                    <td class="px-6 py-4 capitalize">{{ str_replace('_', ' ', $type) }}</td>
                                    <td class="px-6 py-4 text-center">
                                        {!! $uploaded ? '✔️' : '❌' !!}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($uploaded)
                                            <span class="text-green-500">Uploaded</span>
                                        @else
                                            <span class="text-red-500">Not Uploaded</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center space-x-2">
                                            @if($uploaded)
                                                <a href="{{ asset('storage/' . $uploaded->file_path) }}" target="_blank" class="text-blue-600 hover:text-blue-900">
                                                    <i class="fas fa-eye mr-1"></i> View
                                                </a>
                                                <form action="{{ route('profile.attachment.destroy', $uploaded->id) }}" method="POST" onsubmit="return confirm('Remove file?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        <i class="fas fa-trash-alt mr-1"></i> Remove
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('profile.attachment.store', $profile->id) }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="hidden" name="type" value="{{ $type }}">
                                                    <input type="file" name="file" required class="text-sm">
                                                    <button type="submit" class="px-3 py-1 bg-green-600 text-white text-xs rounded-full hover:bg-green-700">
                                                        <i class="fas fa-upload mr-1"></i> Upload
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Apply Now Button -->
                <div class="mt-6 text-center">
                    <a href="{{ route('applications.create', $profile->id) }}"
                       class="inline-block px-6 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                        <i class="fas fa-paper-plane mr-2"></i> Apply Now
                    </a>
                </div>
            </div>

            <!-- Applications List -->
            @if(isset($applications) && $applications->count())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-xl p-6 md:p-8">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6">
                        Your Applications
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium">Date Applied</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium">Countries</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium">Earliest Fly Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                    <tr>
                                        <td class="px-6 py-4">{{ $application->created_at->format('Y-m-d') }}</td>
                                        @php
                                            $countries = is_array($application->countries)
                                                ? $application->countries
                                                : json_decode($application->countries, true);
                                        @endphp
                                        <td class="px-6 py-4">{{ implode(', ', $countries ?? []) }}</td>
                                        <td class="px-6 py-4">{{ $application->earliest_fly_date }}</td>
                                        <td class="px-6 py-4">{{ $application->status ?? 'For Review' }}</td>
                                        <td class="px-6 py-4">{{ $application->remarks ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

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

                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-semibold px-4 py-2 rounded-full 
                            @if($isProfileComplete) bg-green-500 text-white @else bg-yellow-500 text-gray-900 @endif">
                            @if($isProfileComplete)
                                <i class="fas fa-check-circle mr-2"></i> Profile Completed
                            @else
                                <i class="fas fa-exclamation-triangle mr-2"></i> Profile Incomplete
                            @endif
                        </span>
                        <a href="{{ route('profile.edit') }}" 
                           class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-full 
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Requirement
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($requiredAttachments as $type)
                                @php
                                    $uploaded = $attachments->firstWhere('type', $type);
                                @endphp
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white capitalize">
                                        {{ str_replace('_', ' ', $type) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        @if($uploaded)
                                            <span class="text-green-500">
                                                <i class="fas fa-check-circle mr-1"></i> Uploaded
                                            </span>
                                        @else
                                            <span class="text-red-500">
                                                <i class="fas fa-exclamation-circle mr-1"></i> Not Uploaded
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            @if($uploaded)
                                                <a href="{{ asset('storage/' . $uploaded->file_path) }}" 
                                                   target="_blank" 
                                                   class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                    <i class="fas fa-eye mr-1"></i> View
                                                </a>
                                                <form action="{{ route('profile.attachment.destroy', $uploaded->id) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('Are you sure you want to remove this file?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                        <i class="fas fa-trash-alt mr-1"></i> Remove
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('profile.attachment.store', $profile->id) }}" 
                                                      method="POST" enctype="multipart/form-data" 
                                                      class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="hidden" name="type" value="{{ $type }}">
                                                    <input type="file" name="file" required class="text-sm dark:text-gray-300">
                                                    <button type="submit" 
                                                            class="px-3 py-1 bg-green-600 text-white text-xs font-medium rounded-full 
                                                                   hover:bg-green-700 transition duration-300">
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
            </div>

        </div>
    </div>
</x-app-layout>

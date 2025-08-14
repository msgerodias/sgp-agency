<!-- resources/views/applications/show.blade.php -->
<x-app-layout>
    <div class="flex h-screen overflow-hidden">

        <!-- Left Column: now 1/3 width -->
        <div class="w-1/3 overflow-y-auto p-6 space-y-6 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">
            <div class="space-y-4 bg-gray-50 dark:bg-gray-900 p-4 rounded-lg shadow-sm text-gray-900 dark:text-gray-100">
                <p>
                    <strong>Applicant Name:</strong>
                    {{ $application->user->profile->last_name ?? '' }},
                    {{ $application->user->profile->first_name ?? '' }}
                    {{ $application->user->profile->middle_name ?? '' }}
                </p>

                <p>
                    <strong>Bdate/Age/Gender/Status:</strong>
                    @if(!empty($application->user->profile->birthdate))
                        {{ \Carbon\Carbon::parse($application->user->profile->birthdate)->format('m-d-Y') }}
                        | {{ \Carbon\Carbon::parse($application->user->profile->birthdate)->age }} years old
                    @else
                        N/A
                    @endif

                    @php
                        $gender = ucfirst($application->user->profile->gender ?? '');
                        $status = $application->user->profile->civil_status ?? '';
                    @endphp
                    @if($gender && $status)
                        | {{ $gender }} | {{ $status }}
                    @elseif($gender)
                        | {{ $gender }}
                    @elseif($status)
                        | {{ $status }}
                    @endif
                </p>

                <p>
                    <strong>Address:</strong>
                    {{ $application->user->profile->street ?? '' }}
                    {{ $application->user->profile->barangay ?? '' }}
                    {{ $application->user->profile->municipality_city ?? '' }}
                    {{ $application->user->profile->province ?? '' }}
                </p>

                <p>
                    <strong>Contact Number:</strong>
                    @php
                        $contact = $application->user->profile->contact_number ?? '';
                        $alt = $application->user->profile->alternative_number ?? '';
                    @endphp
                    {{ $contact }}@if($contact && $alt) | {{ $alt }} @elseif(!$contact && $alt) {{ $alt }} @endif
                </p>

                <p>
                    <strong>Email Address:</strong>
                    {{ $application->user->profile->email_address ?? '' }}
                </p>

                <p>
                    <strong>Spouse Info:</strong>
                    @php
                        $spouseName = $application->user->profile->spouse_name ?? '';
                        $spouseContact = $application->user->profile->spouse_contact_number ?? '';
                    @endphp
                    {{ $spouseName }}@if($spouseName && $spouseContact) | {{ $spouseContact }} @elseif(!$spouseName && $spouseContact) {{ $spouseContact }} @endif
                </p>

                <p>
                    <strong>Highest Educational Attainment:</strong>
                    {{ $application->user->profile->highest_educational_attainment ?? '' }}
                </p>

                <p>
                    <strong>Ex-Abroad:</strong>
                    @if($application->user->profile->is_ex_abroad)
                        Yes
                        @if(!empty($application->user->profile->last_country))
                            | Last Country: {{ $application->user->profile->last_country }}
                        @endif
                        @if(!empty($application->user->profile->years_abroad))
                            for {{ $application->user->profile->years_abroad }} year/s
                        @endif
                    @else
                        No
                    @endif
                </p>

                <p>
                    <strong>Application Type:</strong>
                    {{ $application->user->profile->application_type ?? '' }}
                </p>
            </div>

            <!-- Update Application Section -->
            <h3 class="text-xl font-bold mt-6 mb-4 text-gray-900 dark:text-gray-100">Update Application</h3>
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.applications.update', $application->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-medium mb-2 text-gray-700 dark:text-gray-300">Status</label>
                    <select name="status" class="border rounded-lg w-full p-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        @foreach(['For Review','Cancelled','Missing Requirements','Approved','In Process','For Training (Manila)','Waiting for Flight Schedule','Scheduled to Fly','Completed'] as $s)
                            <option value="{{ $s }}" {{ $application->status === $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-2 text-gray-700 dark:text-gray-300">Remarks</label>
                    <textarea name="remarks" class="border rounded-lg w-full p-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" rows="4">{{ $application->remarks }}</textarea>
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Update Application
                </button>
            </form>
        </div>

        <!-- Right Column -->
        <div class="flex-1 overflow-y-auto p-6 space-y-6 bg-white dark:bg-gray-800">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Attachments</h3>
            <ul class="space-y-4">
                @forelse($application->user->profile->attachments ?? [] as $attach)
                    <li class="border border-gray-200 dark:border-gray-700 p-4 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                        <p class="font-semibold mb-2">{{ str_replace('_',' ', $attach->type) }}</p>

                        @php
                            $filePath = asset('storage/' . $attach->file_path);
                            $ext = strtolower(pathinfo($attach->file_path, PATHINFO_EXTENSION));
                        @endphp

                        @if(in_array($ext, ['jpg','jpeg','png','gif']))
                            <img src="{{ $filePath }}" alt="Attachment" class="max-w-full h-auto rounded border border-gray-200 dark:border-gray-700">
                        @elseif($ext === 'pdf')
                            <embed src="{{ $filePath }}" type="application/pdf" width="100%" height="920px" class="border rounded border-gray-200 dark:border-gray-700">
                        @else
                            <a href="{{ $filePath }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                Download File
                            </a>
                        @endif
                    </li>
                @empty
                    <li class="text-gray-700 dark:text-gray-300">No attachments uploaded.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>

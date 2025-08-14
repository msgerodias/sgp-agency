<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-2 rounded">
            <ul class="list-disc ml-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ966wIhhfQzBwWzT9+Wj6oA+FvA5h+G9WlX+F/5b/1F6xM1P/J2x4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="py-6 sm:py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 flex items-center p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span class="sr-only">Success</span>
                    <div>
                        <span class="font-medium">Success!</span> {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl p-6 sm:p-8">
                <form action="{{ route('applicant.profile.update', $profile->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6 border-b pb-4">Personal Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                        <!-- Last Name -->
                        <div>
                            <x-input-label for="last_name" :value="__('Last Name')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="last_name" class="block w-full text-sm pl-10" type="text" name="last_name" value="{{ old('last_name', $profile->last_name) }}" required autocomplete="family-name" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- First Name -->
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="first_name" class="block w-full text-sm pl-10" type="text" name="first_name" value="{{ old('first_name', $profile->first_name) }}" required autocomplete="given-name" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Middle Name -->
                        <div>
                            <x-input-label for="middle_name" :value="__('Middle Name')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="middle_name" class="block w-full text-sm pl-10" type="text" name="middle_name" value="{{ old('middle_name', $profile->middle_name) }}" autocomplete="additional-name" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Birthdate -->
                        <div>
                            <x-input-label for="birthdate" :value="__('Birthdate')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="birthdate" class="block w-full text-sm pl-10" type="date" name="birthdate" value="{{ old('birthdate', $profile->birthdate) }}" required autocomplete="bday" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Gender -->
                        <div>
                            <x-input-label for="gender" :value="__('Gender')" class="text-sm" />
                            <div class="relative mt-1">
                                <select id="gender" name="gender" required
                                    class="block w-full text-sm pl-10 border-gray-300 dark:border-gray-700 
                                        dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 
                                        dark:focus:border-indigo-600 focus:ring-indigo-500 
                                        dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Select Gender</option>
                                    <option value="male" @if(old('gender', $profile->gender) == 'male') selected @endif>Male</option>
                                    <option value="female" @if(old('gender', $profile->gender) == 'female') selected @endif>Female</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-venus-mars text-gray-400"></i>
                                </div>
                            </div>
                        </div>


                        <!-- Street -->
                        <div>
                            <x-input-label for="street" :value="__('Street')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="street" class="block w-full text-sm pl-10" type="text" name="street" value="{{ old('street', $profile->street) }}" required autocomplete="address-line1" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-road text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Barangay -->
                        <div>
                            <x-input-label for="barangay" :value="__('Barangay')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="barangay" class="block w-full text-sm pl-10" type="text" name="barangay" value="{{ old('barangay', $profile->barangay) }}" required autocomplete="address-line2" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-building text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Municipality/City -->
                        <div>
                            <x-input-label for="municipality_city" :value="__('Municipality/City')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="municipality_city" class="block w-full text-sm pl-10" type="text" name="municipality_city" value="{{ old('municipality_city', $profile->municipality_city) }}" required autocomplete="address-level2" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-city text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Province -->
                        <div>
                            <x-input-label for="province" :value="__('Province')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="province" class="block w-full text-sm pl-10" type="text" name="province" value="{{ old('province', $profile->province) }}" required autocomplete="address-level1" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-map-marked-alt text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Number -->
                        <div>
                            <x-input-label for="contact_number" :value="__('Contact Number')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="contact_number" class="block w-full text-sm pl-10" type="text" name="contact_number" value="{{ old('contact_number', $profile->contact_number) }}" required autocomplete="tel" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-phone-alt text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Alternative Number (optional) -->
                        <div>
                            <x-input-label for="alternative_number" :value="__('Alternative Number (optional)')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="alternative_number" class="block w-full text-sm pl-10" type="text" name="alternative_number" value="{{ old('alternative_number', $profile->alternative_number) }}" autocomplete="tel-national" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Email Address (optional) -->
                        <div>
                            <x-input-label for="email_address" :value="__('Email Address (optional)')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="email_address" class="block w-full text-sm pl-10" type="email_address" name="email_address" value="{{ old('email_address', $profile->email_address) }}" autocomplete="email" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Civil Status -->
                        <div>
                            <x-input-label for="civil_status" :value="__('Civil Status')" class="text-sm" />
                            <div class="relative mt-1">
                                <select id="civil_status" name="civil_status" required class="block w-full text-sm pl-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Select Civil Status</option>
                                    <option value="Single" @if(old('civil_status', $profile->civil_status) == 'Single') selected @endif>Single</option>
                                    <option value="Married" @if(old('civil_status', $profile->civil_status) == 'Married') selected @endif>Married</option>
                                    <option value="Widow" @if(old('civil_status', $profile->civil_status) == 'Widow') selected @endif>Widow</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-heart text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Spouse Name (if any) -->
                        <div>
                            <x-input-label for="spouse_name" :value="__('Spouse Name (if any)')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="spouse_name" class="block w-full text-sm pl-10" type="text" name="spouse_name" value="{{ old('spouse_name', $profile->spouse_name) }}" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-user-friends text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Spouse Contact Number -->
                        <div>
                            <x-input-label for="spouse_contact_number" :value="__('Spouse Contact Number')" class="text-sm" />
                            <div class="relative mt-1">
                                <x-text-input id="spouse_contact_number" class="block w-full text-sm pl-10" type="text" name="spouse_contact_number" value="{{ old('spouse_contact_number', $profile->spouse_contact_number) }}" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mt-8 mb-6 border-b pb-4">Other Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                        <!-- Highest Educational Attainment -->
                        <div>
                            <x-input-label for="highest_educational_attainment" :value="__('Highest Educational Attainment')" class="text-sm" />
                            <div class="relative mt-1">
                                <select id="highest_educational_attainment" name="highest_educational_attainment" required class="block w-full text-sm pl-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Select Educational Attainment</option>
                                    <option value="None" @if(old('highest_educational_attainment', $profile->highest_educational_attainment) == 'None') selected @endif>None</option>
                                    <option value="Elementary/Primary Education" @if(old('highest_educational_attainment', $profile->highest_educational_attainment) == 'Elementary/Primary Education') selected @endif>Elementary/Primary Education</option>
                                    <option value="High School/Secondary Undergraduate" @if(old('highest_educational_attainment', $profile->highest_educational_attainment) == 'High School/Secondary Undergraduate') selected @endif>High School/Secondary Undergraduate</option>
                                    <option value="High School/Secondary Graduate" @if(old('highest_educational_attainment', $profile->highest_educational_attainment) == 'High School/Secondary Graduate') selected @endif>High School/Secondary Graduate</option>
                                    <option value="Vocational/Tertiary" @if(old('highest_educational_attainment', $profile->highest_educational_attainment) == 'Vocational/Tertiary') selected @endif>Vocational/Tertiary</option>
                                    <option value="College/University Undergraduate" @if(old('highest_educational_attainment', $profile->highest_educational_attainment) == 'College/University Undergraduate') selected @endif>College/University Undergraduate</option>
                                    <option value="College/University Graduate" @if(old('highest_educational_attainment', $profile->highest_educational_attainment) == 'College/University Graduate') selected @endif>College/University Graduate</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-graduation-cap text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Applying For -->
                        <div>
                            <x-input-label for="application_type" :value="__('What are you Applying?')" class="text-sm" />
                            <div class="relative mt-1">
                                <select id="application_type" name="application_type" required class="block w-full text-sm pl-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Select Job Type</option>
                                    <option value="Domestic Works" @if(old('application_type', $profile->application_type) == 'Domestic Works') selected @endif>Domestic Works</option>
                                    <option value="Skilled Job" @if(old('application_type', $profile->application_type) == 'Skilled Job') selected @endif>Skilled Job</option>
                                    <option value="Professional" @if(old('application_type', $profile->application_type) == 'Professional') selected @endif>Professional</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-briefcase text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Are you an Ex-Abroad? -->
                        <div>
                            <x-input-label for="is_ex_abroad" :value="__('Are you an Ex-Abroad?')" class="text-sm" />
                            <div class="relative mt-1">
                                <select id="is_ex_abroad" name="is_ex_abroad" class="block w-full text-sm pl-10 border-gray-300 dark:border-gray-700 
                                    dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 
                                    focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="0" @if($profile->is_ex_abroad == 0) selected @endif>No</option>
                                    <option value="1" @if($profile->is_ex_abroad == 1) selected @endif>Yes</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-question-circle text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Last Country and Years Abroad (hidden by default) -->
                        <div id="exAbroadFields" style="display: none;">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                
                                <!-- Last Country -->
                                <div>
                                    <x-input-label for="last_country" :value="__('Last Country')" class="text-sm" />
                                    <div class="relative mt-1">
                                        <x-text-input id="last_country" class="block w-full text-sm pl-10" type="text" name="last_country" 
                                            value="{{ old('last_country', $profile->last_country) }}" />
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="fas fa-globe-americas text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Years Abroad -->
                                <div>
                                    <x-input-label for="years_abroad" :value="__('How Many Years?')" class="text-sm" />
                                    <div class="relative mt-1">
                                        <x-text-input id="years_abroad" class="block w-full text-sm pl-10" type="number" name="years_abroad" 
                                            value="{{ old('years_abroad', $profile->years_abroad) }}" />
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="fas fa-calendar text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="mt-8 flex justify-end">
                        <x-primary-button class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-save mr-2"></i> Update Profile
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const exAbroadSelect = document.getElementById('is_ex_abroad');
    const exAbroadFields = document.getElementById('exAbroadFields');

    function toggleExAbroadFields() {
        if (exAbroadSelect.value === '1') {
            exAbroadFields.style.display = 'grid';
            exAbroadFields.style.gridTemplateColumns = 'repeat(auto-fit, minmax(250px, 1fr))';
            exAbroadFields.style.gap = '1rem';
        } else {
            exAbroadFields.style.display = 'none';
        }
    }

    // Run on page load
    toggleExAbroadFields();

    // Run when changed
    exAbroadSelect.addEventListener('change', toggleExAbroadFields);
});
</script>

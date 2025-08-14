<x-app-layout>
    <div class="mt-12 max-w-xl mx-auto bg-white shadow p-6 rounded">
        <h1 class="text-xl font-bold mb-4">Apply Now</h1>

        <form method="POST" action="{{ route('applications.store') }}">
            @csrf

            {{-- Country Selection --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Select Country you are applying</label>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="countries[]" value="Kingdom of Saudi Arabia" class="mr-2">
                        Kingdom of Saudi Arabia
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="countries[]" value="Qatar" class="mr-2">
                        Qatar
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="countries[]" value="Kuwait" class="mr-2">
                        Kuwait
                    </label>
                </div>
            </div>

            {{-- Earliest Date to Fly --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Earliest Date to fly</label>
                <input type="date" name="earliest_fly_date" class="border rounded p-2 w-full">
            </div>
        <!--
            {{-- Call Interview Time --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Available time for call interview</label>
                <select name="call_time" id="call_time" class="border rounded p-2 w-full">
                    <option value="Anytime">Anytime</option>
                    <option value="Other">Other</option>
                </select>
                <input type="time" name="call_time_other" id="call_time_other" class="border rounded p-2 w-full mt-2 hidden">
            </div>
        -->
            {{-- Referred By --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Referred By</label>
                <input type="text" name="referred_by" class="border rounded p-2 w-full">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Submit Application
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('call_time').addEventListener('change', function () {
            document.getElementById('call_time_other').classList.toggle('hidden', this.value !== 'Other');
        });
    </script>
</x-app-layout>
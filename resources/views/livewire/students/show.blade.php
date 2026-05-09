<div class="min-h-screen bg-gray-950 text-white p-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-4xl font-bold">
                Student Details
            </h1>

            <p class="text-gray-400 mt-2">
                View complete student information
            </p>

        </div>

        <a
            href="{{ route('students.index') }}"
            class="bg-gray-800 hover:bg-gray-700 px-5 py-3 rounded-xl transition"
        >
            ← Back to Students
        </a>

    </div>

    {{-- MAIN CARD --}}
    <div class="bg-gray-900 border border-gray-800 rounded-3xl p-8 shadow-2xl">

        {{-- TOP SECTION --}}
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">

            <div>

                <h2 class="text-3xl font-bold">
                    {{ $student->full_name }}
                </h2>

                <p class="text-gray-400 mt-2">
                    Enrollment : {{ $student->enrollment_number }}
                </p>

            </div>

      
        </div>

        {{-- DETAILS GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            {{-- EMAIL --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    Email
                </p>

                <p class="font-semibold">
                    {{ $student->email }}
                </p>

            </div>

            {{-- AGE --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    Age
                </p>

                <p class="font-semibold">
                    {{ $student->age }} Years
                </p>

            </div>

            {{-- DOB --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    Date of Birth
                </p>

                <p class="font-semibold">
                    {{ $student->date_of_birth }}
                </p>

            </div>

            {{-- CLASS --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    Class
                </p>

                <p class="text-blue-400 font-semibold">
                    {{ $student->classroom?->name }}
                </p>

            </div>

            {{-- ROLL --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    Roll Number
                </p>

                <p class="font-semibold">
                    {{ $student->roll_number }}
                </p>

            </div>

            {{-- GPA --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    GPA
                </p>

                <p class="font-semibold text-green-400">
                    {{ $student->gpa ?? 'N/A' }}
                </p>

            </div>

            {{-- GENDER --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    Gender
                </p>

                <p class="font-semibold">
                    {{ $student->gender }}
                </p>

            </div>

            {{-- BLOOD GROUP --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    Blood Group
                </p>

                <p class="font-semibold text-red-400">
                    {{ $student->blood_group }}
                </p>

            </div>

            {{-- PHONE --}}
            <div class="bg-gray-800 rounded-2xl p-5">

                <p class="text-sm text-gray-400 mb-2">
                    Phone
                </p>

                <p class="font-semibold">
                    {{ $student->phone }}
                </p>

            </div>

        </div>

        {{-- PARENT INFO --}}
        <div class="mt-10">

            <h3 class="text-2xl font-bold mb-5">
                Parent Information
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-gray-800 rounded-2xl p-5">

                    <p class="text-sm text-gray-400 mb-2">
                        Parent Name
                    </p>

                    <p class="font-semibold">
                        {{ $student->parent_name }}
                    </p>

                </div>

                <div class="bg-gray-800 rounded-2xl p-5">

                    <p class="text-sm text-gray-400 mb-2">
                        Parent Phone
                    </p>

                    <p class="font-semibold">
                        {{ $student->parent_phone }}
                    </p>

                </div>

            </div>

        </div>

        {{-- AUDIT TRAIL --}}
        <div class="mt-10">

            <h3 class="text-2xl font-bold mb-5">
                Audit Information
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-gray-800 rounded-2xl p-5">

                    <p class="text-sm text-gray-400 mb-2">
                        Created By
                    </p>

                    <p class="font-semibold">
                        {{ $student->creator?->name }}
                    </p>

                </div>

                <div class="bg-gray-800 rounded-2xl p-5">

                    <p class="text-sm text-gray-400 mb-2">
                        Created At
                    </p>

                    <p class="font-semibold">
                        {{ $student->created_at?->format('Y-m-d h:i A') }}
                    </p>

                </div>

                <div class="bg-gray-800 rounded-2xl p-5">

                    <p class="text-sm text-gray-400 mb-2">
                        Updated By
                    </p>

                    <p class="font-semibold">
                        {{ $student->updater?->name ?? 'N/A' }}
                    </p>

                </div>

                <div class="bg-gray-800 rounded-2xl p-5">

                    <p class="text-sm text-gray-400 mb-2">
                        Updated At
                    </p>

                    <p class="font-semibold">
                        {{ $student->updated_at?->format('Y-m-d h:i A') }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>
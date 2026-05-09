<div class="min-h-screen bg-gray-950 text-white p-6">

    {{-- HEADER --}}
    <div class="mb-8">

        <h1 class="text-4xl font-bold">
            School Dashboard
        </h1>

        <p class="text-gray-400 mt-2">
            School analytics and statistics overview
        </p>

    </div>

    {{-- TOTAL STUDENTS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-blue-600 rounded-3xl p-6 shadow-xl">

            <p class="text-lg text-blue-100">
                Total Students
            </p>

            <h2 class="text-5xl font-bold mt-3">
                {{ $totalStudents }}
            </h2>

        </div>

    </div>

    {{-- STUDENTS BY CLASS --}}
    <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6 mb-8">

        <h2 class="text-2xl font-bold mb-6">
            Students By Class
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

            @foreach($studentsByClass as $class)

                <div class="bg-gray-800 rounded-2xl p-5">

                    <p class="text-gray-400 text-sm">
                        {{ $class->name }}
                    </p>

                    <h3 class="text-3xl font-bold mt-2 text-blue-400">
                        {{ $class->students_count }}
                    </h3>

                </div>

            @endforeach

        </div>

    </div>

    {{-- TOP PERFORMERS --}}
    <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6 mb-8">

        <h2 class="text-2xl font-bold mb-6">
            Top Performers
        </h2>

        <div class="space-y-4">

            @foreach($topPerformers as $student)

                <div class="flex items-center justify-between bg-gray-800 rounded-2xl p-4">

                    <div>

                        <h3 class="font-semibold text-lg">
                            {{ $student->full_name }}
                        </h3>

                        <p class="text-gray-400 text-sm">
                            {{ $student->classroom?->name }}
                        </p>

                    </div>

                    <span class="bg-green-500/20 text-green-400 px-4 py-2 rounded-full font-bold">
                        GPA {{ $student->gpa }}
                    </span>

                </div>

            @endforeach

        </div>

    </div>

    {{-- GENDER DISTRIBUTION --}}
    <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6 mb-8">

        <h2 class="text-2xl font-bold mb-6">
            Gender Distribution
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-blue-500/20 rounded-2xl p-6 text-center">

                <h3 class="text-xl font-bold text-blue-400">
                    Male
                </h3>

                <p class="text-4xl font-bold mt-3">
                    {{ $maleCount }}
                </p>

            </div>

            <div class="bg-pink-500/20 rounded-2xl p-6 text-center">

                <h3 class="text-xl font-bold text-pink-400">
                    Female
                </h3>

                <p class="text-4xl font-bold mt-3">
                    {{ $femaleCount }}
                </p>

            </div>

            <div class="bg-purple-500/20 rounded-2xl p-6 text-center">

                <h3 class="text-xl font-bold text-purple-400">
                    Other
                </h3>

                <p class="text-4xl font-bold mt-3">
                    {{ $otherCount }}
                </p>

            </div>

        </div>

    </div>

    {{-- RECENT STUDENTS --}}
    <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6 mb-8">

        <h2 class="text-2xl font-bold mb-6">
            Recently Enrolled Students
        </h2>

        <div class="space-y-4">

            @foreach($recentStudents as $student)

                <div class="bg-gray-800 rounded-2xl p-4 flex justify-between items-center">

                    <div>

                        <h3 class="font-semibold">
                            {{ $student->full_name }}
                        </h3>

                        <p class="text-sm text-gray-400">
                            {{ $student->created_at?->diffForHumans() }}
                        </p>

                    </div>

                    <span class="text-blue-400">
                        {{ $student->classroom?->name }}
                    </span>

                </div>

            @endforeach

        </div>

    </div>

    {{-- AGE DISTRIBUTION --}}
    <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6">

        <h2 class="text-2xl font-bold mb-6">
            Age Distribution
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach($ageGroups as $range => $count)

                <div class="bg-gray-800 rounded-2xl p-6 text-center">

                    <h3 class="text-xl font-bold text-cyan-400">
                        {{ $range }}
                    </h3>

                    <p class="text-4xl font-bold mt-3">
                        {{ $count }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</div>
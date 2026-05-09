<div class="min-h-screen bg-gray-950 text-white p-6">

    {{-- PAGE HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-4xl font-bold tracking-tight text-white">
                Students Management
            </h1>

            <p class="text-gray-400 mt-1 text-sm">
                Manage students, filters, deleted records and academic information
            </p>
        </div>

        <div class="flex flex-wrap gap-3">

            {{-- CREATE STUDENT --}}
            <a href="{{ route('students.create') }}"
                class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 transition font-semibold text-white shadow-lg">
                + Create Student
            </a>

            {{-- REFRESH --}}
            <button wire:click="$refresh"
                class="px-5 py-2.5 rounded-xl border border-gray-700 bg-gray-900 hover:bg-gray-800 transition font-medium">
                Refresh
            </button>

            {{-- TOGGLE DELETED --}}
            <button wire:click="$toggle('showDeleted')"
                class="px-5 py-2.5 rounded-xl font-semibold transition
            {{ $showDeleted ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }}">
                {{ $showDeleted ? 'Show Active Students' : 'Show Deleted Students' }}
            </button>

        </div>

    </div>

    {{-- SUCCESS MESSAGE --}}
    @if (session()->has('success'))
        <div class="mb-6 rounded-2xl bg-green-600/20 border border-green-500 px-5 py-4 text-green-300">
            {{ session('success') }}
        </div>
    @endif

    {{-- FILTER SECTION --}}
    <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6 shadow-2xl mb-6">

        {{-- HEADER --}}
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6 gap-4">

            <div>

                <h2 class="text-2xl font-bold text-white">
                    Search & Filters
                </h2>

                <p class="text-gray-400 text-sm mt-1">
                    Quickly search and filter students
                </p>

            </div>

            <button
                wire:click="
                $set('search', '');
                $set('class', '');
                $set('gender', '');
                $set('bloodGroup', '');
                $set('minAge', '');
                $set('maxAge', '');
                $set('minGpa', '');
                $set('maxGpa', '');
            "
                class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-5 py-2.5 rounded-xl transition">
                Clear Filters
            </button>

        </div>

        {{-- HORIZONTAL FILTERS --}}
        <div class="flex flex-wrap items-end gap-4">

            {{-- SEARCH --}}
            <div class="min-w-[280px] flex-1">

                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Search
                </label>

                <input type="text" wire:model.live.debounce.500ms="search" placeholder="Name, Email, Enrollment..."
                    class="w-full rounded-xl bg-gray-800 border border-gray-700 text-white placeholder-gray-500 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

            {{-- CLASS --}}
            <div class="min-w-[180px]">

                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Class
                </label>

                <select wire:model.live="class"
                    class="w-full rounded-xl bg-gray-800 border border-gray-700 text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">All Classes</option>

                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">
                            {{ $classroom->name }}
                        </option>
                    @endforeach

                </select>

            </div>

            {{-- GENDER --}}
            <div class="min-w-[160px]">

                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Gender
                </label>

                <select wire:model.live="gender"
                    class="w-full rounded-xl bg-gray-800 border border-gray-700 text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">All</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>

                </select>

            </div>

            {{-- BLOOD GROUP --}}
            <div class="min-w-[170px]">

                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Blood Group
                </label>

                <select wire:model.live="bloodGroup"
                    class="w-full rounded-xl bg-gray-800 border border-gray-700 text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">All</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>O+</option>
                    <option>O-</option>

                </select>

            </div>

            {{-- MIN AGE --}}
            <div class="w-[120px]">

                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Min Age
                </label>

                <input type="number" wire:model.live="minAge" placeholder="5"
                    class="w-full rounded-xl bg-gray-800 border border-gray-700 text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

            {{-- MAX AGE --}}
            <div class="w-[120px]">

                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Max Age
                </label>

                <input type="number" wire:model.live="maxAge" placeholder="15"
                    class="w-full rounded-xl bg-gray-800 border border-gray-700 text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

            {{-- MIN GPA --}}
            <div class="w-[130px]">

                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Min GPA
                </label>

                <input type="number" step="0.01" wire:model.live="minGpa" placeholder="0.00"
                    class="w-full rounded-xl bg-gray-800 border border-gray-700 text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

            {{-- MAX GPA --}}
            <div class="w-[130px]">

                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Max GPA
                </label>

                <input type="number" step="0.01" wire:model.live="maxGpa" placeholder="4.00"
                    class="w-full rounded-xl bg-gray-800 border border-gray-700 text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-gray-900 border border-gray-800 rounded-3xl overflow-hidden shadow-2xl">

        {{-- TABLE HEADER --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-800">

            <div>

                <h2 class="text-2xl font-bold text-white">
                    Students List
                </h2>

                <p class="text-sm text-gray-400 mt-1">
                    Total Students : {{ $students->total() }}
                </p>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1400px]">

                <thead class="bg-blue-600 text-white">

                    <tr class="text-left text-sm uppercase tracking-wider">

                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Enrollment</th>
                        <th class="px-6 py-4">Student</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Class</th>
                        <th class="px-6 py-4">Roll</th>
                        <th class="px-6 py-4">Age</th>
                        <th class="px-6 py-4">Gender</th>
                        <th class="px-6 py-4">GPA</th>
                        <th class="px-6 py-4">Parent Phone</th>
                        <th class="px-6 py-4">Created By</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Actions</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-800">

                    @forelse($students as $student)
                        <tr wire:key="student-{{ $student->id }}" class="hover:bg-gray-800/50 transition">

                            <td class="px-6 py-5 font-bold text-blue-400">
                                #{{ $student->id }}
                            </td>

                            <td class="px-6 py-5">
                                {{ $student->enrollment_number }}
                            </td>

                            <td class="px-6 py-5">

                                <div>

                                    <div class="font-semibold text-white">
                                        {{ $student->full_name }}
                                    </div>

                                    <div class="text-xs text-gray-500 mt-1">
                                        Student
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-gray-300">
                                {{ $student->email }}
                            </td>

                            <td class="px-6 py-5">

                                <span
                                    class="bg-blue-600/20 text-blue-400 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $student->classroom?->name }}
                                </span>

                            </td>

                            <td class="px-6 py-5">
                                {{ $student->roll_number }}
                            </td>

                            <td class="px-6 py-5">
                                {{ $student->age }}
                            </td>

                            <td class="px-6 py-5">

                                <span
                                    class="bg-cyan-500/20 text-cyan-400 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $student->gender }}
                                </span>

                            </td>

                            <td class="px-6 py-5">

                                <span
                                    class="bg-green-500/20 text-green-400 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $student->gpa }}
                                </span>

                            </td>

                            <td class="px-6 py-5">
                                {{ $student->parent_phone }}
                            </td>

                            <td class="px-6 py-5">
                                {{ $student->creator?->name }}
                            </td>

                            <td class="px-6 py-5">

                                @if ($student->deleted_at)
                                    <span
                                        class="bg-red-500/20 text-red-400 text-xs font-semibold px-3 py-1 rounded-full">
                                        Deleted
                                    </span>
                                @else
                                    <span
                                        class="bg-green-500/20 text-green-400 text-xs font-semibold px-3 py-1 rounded-full">
                                        Active
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-center flex-wrap gap-2">

                                    <a href="{{ route('students.view', $student->id) }}"
                                        class="bg-sky-500 hover:bg-sky-600 text-white text-sm px-4 py-2 rounded-xl transition">
                                        View
                                    </a>

                                    <a href="{{ route('students.edit', $student->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-black text-sm px-4 py-2 rounded-xl transition">
                                        Edit
                                    </a>

                                    @if (!$showDeleted)
                                        <button wire:click="delete({{ $student->id }})"
                                            class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2 rounded-xl transition">
                                            Delete
                                        </button>
                                    @else
                                        <button wire:click="restore({{ $student->id }})"
                                            class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-xl transition">
                                            Restore
                                        </button>

                                        <button wire:click="forceDelete({{ $student->id }})"
                                            class="bg-gray-700 hover:bg-gray-800 text-white text-sm px-4 py-2 rounded-xl transition">
                                            Force Delete
                                        </button>
                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="13" class="text-center py-16">

                                <h3 class="text-xl font-semibold text-white mb-2">
                                    No Students Found
                                </h3>

                                <p class="text-gray-400 text-sm">
                                    Try changing search values or filters
                                </p>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION --}}
    <div class="mt-6 flex justify-center">

        <div class="bg-gray-900 border border-gray-800 rounded-2xl px-4 py-3 shadow-lg">

            {{ $students->links() }}

        </div>

    </div>

</div>

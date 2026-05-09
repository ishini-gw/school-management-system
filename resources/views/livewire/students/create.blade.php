<div class="min-h-screen bg-gray-950 text-white p-6">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">

        <div>

            <h1 class="text-4xl font-bold">
                Create Student
            </h1>

            <p class="text-gray-400 mt-2">
                Add a new student record to the system
            </p>

        </div>

        <a
            href="{{ route('students.index') }}"
            class="bg-gray-800 hover:bg-gray-700 border border-gray-700 px-5 py-3 rounded-2xl transition font-medium"
        >
            Back to Students
        </a>

    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session()->has('success'))

        <div class="bg-green-500/20 border border-green-500 text-green-400 px-5 py-4 rounded-2xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    {{-- FORM --}}
    <form wire:submit="save">

        <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6 shadow-2xl">

            {{-- FORM GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                {{-- Enrollment Number --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Enrollment Number
                    </label>

                    <input
                        type="text"
                        wire:model="enrollment_number"
                        placeholder="Enter enrollment number"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('enrollment_number')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- First Name --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        First Name
                    </label>

                    <input
                        type="text"
                        wire:model="first_name"
                        placeholder="Enter first name"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('first_name')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Last Name --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Last Name
                    </label>

                    <input
                        type="text"
                        wire:model="last_name"
                        placeholder="Enter last name"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('last_name')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Email --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Email
                    </label>

                    <input
                        type="email"
                        wire:model="email"
                        placeholder="Enter email"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('email')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Date of Birth --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Date of Birth
                    </label>

                    <input
                        type="date"
                        wire:model="date_of_birth"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('date_of_birth')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Gender --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Gender
                    </label>

                    <select
                        wire:model="gender"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>

                    </select>

                    @error('gender')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Phone --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        wire:model="phone"
                        placeholder="Enter phone number"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('phone')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Parent Name --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Parent Name
                    </label>

                    <input
                        type="text"
                        wire:model="parent_name"
                        placeholder="Enter parent name"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('parent_name')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Parent Phone --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Parent Phone
                    </label>

                    <input
                        type="text"
                        wire:model="parent_phone"
                        placeholder="Enter parent phone"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('parent_phone')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Blood Group --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Blood Group
                    </label>

                    <select
                        wire:model="blood_group"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                        <option value="">Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>

                    </select>

                    @error('blood_group')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Classroom --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Classroom
                    </label>

                    <select
                        wire:model="class_id"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                        <option value="">Select Classroom</option>

                        @foreach($classrooms as $classroom)

                            <option value="{{ $classroom->id }}">
                                {{ $classroom->name }}
                            </option>

                        @endforeach

                    </select>

                    @error('class_id')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- Roll Number --}}
                <div>

                    <label class="block mb-2 text-sm text-gray-300">
                        Roll Number
                    </label>

                    <input
                        type="number"
                        wire:model="roll_number"
                        placeholder="Enter roll number"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('roll_number')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

            </div>

            {{-- Address --}}
            <div class="mt-6">

                <label class="block mb-2 text-sm text-gray-300">
                    Address
                </label>

                <textarea
                    wire:model="address"
                    rows="4"
                    placeholder="Enter address"
                    class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>

                @error('address')
                    <span class="text-red-400 text-sm">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            {{-- ACTION BUTTONS --}}
            <div class="mt-8 flex flex-wrap gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-2xl font-semibold transition"
                >
                    Create Student
                </button>

                <a
                    href="{{ route('students.index') }}"
                    class="bg-gray-700 hover:bg-gray-800 px-6 py-3 rounded-2xl font-semibold transition"
                >
                    Cancel
                </a>

            </div>

        </div>

    </form>

</div>
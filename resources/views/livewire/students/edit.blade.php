<div class="min-h-screen bg-gray-950 text-white p-6">

    <div class="mb-8">
        <h1 class="text-4xl font-bold">
            Edit Student
        </h1>

        <p class="text-gray-400 mt-2">
            Update student information
        </p>
    </div>

    @if(session()->has('success'))
        <div class="bg-green-500/20 border border-green-500 text-green-400 px-5 py-4 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('warning'))
        <div class="bg-yellow-500/20 border border-yellow-500 text-yellow-400 px-5 py-4 rounded-2xl mb-6">
            {{ session('warning') }}
        </div>
    @endif

    <form wire:submit="update">

        <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                {{-- Enrollment Number --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        Enrollment Number
                    </label>

                    <input
                        type="text"
                        wire:model="enrollment_number"
                        disabled
                        class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-3 text-gray-400"
                    >
                </div>

                {{-- First Name --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        First Name
                    </label>

                    <input
                        type="text"
                        wire:model="first_name"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('first_name')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
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
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('last_name')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
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
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('email')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
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
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('date_of_birth')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Gender --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        Gender
                    </label>

                    <select
                        wire:model="gender"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>

                    @error('gender')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        Phone
                    </label>

                    <input
                        type="text"
                        wire:model="phone"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('phone')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Address --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        Address
                    </label>

                    <input
                        type="text"
                        wire:model="address"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('address')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Blood Group --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        Blood Group
                    </label>

                    <select
                        wire:model="blood_group"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
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
                        <span class="text-red-400 text-sm">{{ $message }}</span>
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
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('parent_name')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
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
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('parent_phone')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Class --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        Class
                    </label>

                    <select
                        wire:model="class_id"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >
                        <option value="">Select Class</option>

                        @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">
                                {{ $classroom->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('class_id')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Roll Number --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        Roll Number
                    </label>

                    <input
                        type="text"
                        wire:model="roll_number"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('roll_number')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- GPA --}}
                <div>
                    <label class="block mb-2 text-sm text-gray-300">
                        GPA
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        wire:model="gpa"
                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white"
                    >

                    @error('gpa')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-xl font-semibold transition"
                >
                    Update Student
                </button>

                <a
                    href="{{ route('students.index') }}"
                    class="bg-gray-700 hover:bg-gray-800 px-6 py-3 rounded-xl font-semibold transition"
                >
                    Cancel
                </a>

            </div>

        </div>

    </form>

</div>
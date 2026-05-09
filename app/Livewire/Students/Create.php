<?php

namespace App\Livewire\Students;

use App\Models\Classroom;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $enrollment_number;
    public $first_name;
    public $last_name;
    public $email;
    public $date_of_birth;
    public $gender;
    public $address;
    public $phone;
    public $parent_name;
    public $parent_phone;
    public $blood_group;
    public $class_id;
    public $roll_number;

    protected function rules()
    {
        return [

            'enrollment_number' => 'required|string|unique:students,enrollment_number',

            'first_name' => 'required|string|max:255',

            'last_name' => 'required|string|max:255',

            'email' => 'required|email|unique:students,email',

            'date_of_birth' => [
                'required',
                'date',
                'before:today',
                'after:' . Carbon::now()->subYears(100)->format('Y-m-d'),
            ],

            'gender' => 'nullable|in:Male,Female,Other',

            'address' => 'nullable|string',

            'phone' => [
                'nullable',
                'regex:/^[0-9\-\+\s\(\)]{10,}$/'
            ],

            'parent_name' => 'nullable|string|max:255',

            'parent_phone' => [
                'nullable',
                'regex:/^[0-9\-\+\s\(\)]{10,}$/'
            ],

            'blood_group' => 'nullable|in:A+,A-,B+,B-,O+,O-,AB+,AB-',

            'roll_number' => 'nullable|integer|min:1',

            'class_id' => 'required|exists:classrooms,id',
        ];
    }

    protected $messages = [

        'enrollment_number.unique' => 'Enrollment number already exists.',

        'email.unique' => 'Email already exists.',

        'phone.regex' => 'Invalid phone number format.',

        'parent_phone.regex' => 'Invalid parent phone number format.',
    ];

    public function save()
    {
        $this->validate();

        Student::create([

            'enrollment_number' => $this->enrollment_number,

            'first_name' => $this->first_name,

            'last_name' => $this->last_name,

            'email' => $this->email,

            'date_of_birth' => $this->date_of_birth,

            'gender' => $this->gender,

            'address' => $this->address,

            'phone' => $this->phone,

            'parent_name' => $this->parent_name,

            'parent_phone' => $this->parent_phone,

            'blood_group' => $this->blood_group,

            'class_id' => $this->class_id,

            'roll_number' => $this->roll_number,

            'created_by' => Auth::id(),
        ]);

        session()->flash('success', 'Student created successfully.');

        return redirect()->route('student.index');
    }

    public function render()
    {
        return view('livewire.students.create', [

            'classrooms' => Classroom::orderBy('name')->get()

        ]);
    }
}
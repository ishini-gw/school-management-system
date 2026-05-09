<?php

namespace App\Livewire\Students;

use App\Models\Classroom;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Student $student;

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
    public $gpa;

    public $originalClassId;

    public function mount($id)
    {
        $this->student = Student::findOrFail($id);

        if ($this->student->deleted_at) {
            abort(403, 'Deleted students cannot be edited.');
        }

        $this->enrollment_number = $this->student->enrollment_number;
        $this->first_name = $this->student->first_name;
        $this->last_name = $this->student->last_name;
        $this->email = $this->student->email;
        $this->date_of_birth = $this->student->date_of_birth;
        $this->gender = $this->student->gender;
        $this->address = $this->student->address;
        $this->phone = $this->student->phone;
        $this->parent_name = $this->student->parent_name;
        $this->parent_phone = $this->student->parent_phone;
        $this->blood_group = $this->student->blood_group;
        $this->class_id = $this->student->class_id;
        $this->roll_number = $this->student->roll_number;
        $this->gpa = $this->student->gpa;

        $this->originalClassId = $this->student->class_id;
    }

    protected function rules()
    {
        return [

            'enrollment_number' => [
                'required',
                'string',
                Rule::unique('students', 'enrollment_number')
                    ->ignore($this->student->id)
            ],

            'first_name' => 'required|string|max:255',

            'last_name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')
                    ->ignore($this->student->id)
            ],

            'date_of_birth' => 'required|date|before_or_equal:18 years ago',

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

    public function update()
    {
        $this->validate();

        $age = Carbon::parse($this->date_of_birth)->age;

        $this->student->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'age' => $age,
            'gender' => $this->gender,
            'address' => $this->address,
            'phone' => $this->phone,
            'parent_name' => $this->parent_name,
            'parent_phone' => $this->parent_phone,
            'blood_group' => $this->blood_group,
            'class_id' => $this->class_id,
            'roll_number' => $this->roll_number,
            'gpa' => $this->gpa,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Student updated successfully.');

        return redirect()->route('students.index');
    }

    public function render()
    {
        return view('livewire.students.edit', [
            'classrooms' => Classroom::all()
        ]);
    }
}
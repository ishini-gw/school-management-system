<?php

namespace App\Livewire\Students;

use App\Models\Student;
use App\Models\Classroom;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $class = '';
    public $gender = '';
    public $bloodGroup = '';
    public $minAge = '';
    public $maxAge = '';
    public $minGpa = '';
    public $maxGpa = '';

   
    public $showDeleted = false;

  
    protected $queryString = [
        'search',
        'class',
        'gender',
        'bloodGroup',
        'minAge',
        'maxAge',
        'minGpa',
        'maxGpa',
        'showDeleted',
    ];

    
    public function updating($field)
    {
        $this->resetPage();
    }

   
    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        $this->resetPage();
    }

  
    public function restore($id)
    {
        Student::onlyTrashed()
            ->findOrFail($id)
            ->restore();

        $this->resetPage();
    }

   
    public function forceDelete($id)
    {
        Student::onlyTrashed()
            ->findOrFail($id)
            ->forceDelete();

        $this->resetPage();
    }

    public function render()
    {
        $students = Student::query()
            ->with(['classroom', 'creator'])

            ->when($this->showDeleted, function ($query) {
                $query->onlyTrashed();
            })

            
            ->when($this->search, function ($query) {

                $search = strtolower($this->search);

                $query->where(function ($q) use ($search) {

                    $q->whereRaw('LOWER(first_name) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(last_name) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(email) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(enrollment_number) LIKE ?', ["%{$search}%"]);
                });
            })

          
            ->when($this->class, function ($query) {

                $query->where('class_id', $this->class);
            })

           
            ->when($this->gender, function ($query) {

                $query->where('gender', $this->gender);
            })

           
            ->when($this->bloodGroup, function ($query) {

                $query->where('blood_group', $this->bloodGroup);
            })

          
            ->when($this->minAge, function ($query) {

                $maxDob = Carbon::now()
                    ->subYears($this->minAge)
                    ->format('Y-m-d');

                $query->whereDate('date_of_birth', '<=', $maxDob);
            })

           
            ->when($this->maxAge, function ($query) {

                $minDob = Carbon::now()
                    ->subYears($this->maxAge)
                    ->format('Y-m-d');

                $query->whereDate('date_of_birth', '>=', $minDob);
            })

          
            ->when($this->minGpa, function ($query) {

                $query->where('gpa', '>=', $this->minGpa);
            })

            ->when($this->maxGpa, function ($query) {

                $query->where('gpa', '<=', $this->maxGpa);
            })

            
            ->orderBy('class_id')
            ->orderBy('roll_number')
            ->paginate(30);

        return view('livewire.students.index', [
            'students' => $students,
            'classrooms' => Classroom::all(),
        ]);
    }
}
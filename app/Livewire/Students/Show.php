<?php

namespace App\Livewire\Students;

use Livewire\Component;
use App\Models\Student;


class Show extends Component
{

    public Student $student;

    public function mount($id)
    {
        $this->student = Student::with([
            'classroom',
            'creator',
            'updater',
        ])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.students.show');
    }
}

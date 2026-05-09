<?php

namespace App\Observers;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function creating(Student $student): void
    {
        $student->created_by = auth::id();
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updating(Student $student): void
    {
         $student->updated_by = Auth::id();
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleting(Student $student): void
    {
        
        $student->deleted_by = auth::id();
        $student->saveQuietly();
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}

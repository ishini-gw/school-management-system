<?php

namespace App\Livewire\Dashboard;

use App\Models\Classroom;
use App\Models\Student;
use Livewire\Component;
use Carbon\Carbon;

class SchoolDashboard extends Component
{
    public function render()
    {
        // Total Students
        $totalStudents = Student::count();
        $students = Student::all();

        // Students By Class
        $studentsByClass = Classroom::withCount('students')->get();

        // Top Performers
        $topPerformers = Student::orderByDesc('gpa')
            ->take(5)
            ->get();

        // Gender Distribution
        $maleCount = Student::where('gender', 'Male')->count();
        $femaleCount = Student::where('gender', 'Female')->count();
        $otherCount = Student::where('gender', 'Other')->count();

        // Recently Enrolled
        $recentStudents = Student::latest()->take(5)->get();

        // Age Distribution
        $ageGroups = [
            '5-10' => $students->filter(function ($student) {
                return Carbon::parse($student->date_of_birth)->age >= 5
                    && Carbon::parse($student->date_of_birth)->age <= 10;
            })->count(),

            '11-15' => $students->filter(function ($student) {
                return Carbon::parse($student->date_of_birth)->age >= 11
                    && Carbon::parse($student->date_of_birth)->age <= 15;
            })->count(),

            '16-20' => $students->filter(function ($student) {
                return Carbon::parse($student->date_of_birth)->age >= 16
                    && Carbon::parse($student->date_of_birth)->age <= 20;
            })->count(),
        ];

        return view('livewire.dashboard.school-dashboard', [
            'totalStudents' => $totalStudents,
            'studentsByClass' => $studentsByClass,
            'topPerformers' => $topPerformers,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'otherCount' => $otherCount,
            'recentStudents' => $recentStudents,
            'ageGroups' => $ageGroups,
        ]);
    }
}
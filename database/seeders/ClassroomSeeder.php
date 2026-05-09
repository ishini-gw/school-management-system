<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $classes = [
            ['name' => 'Class 1-A', 'section' => 'A'],
            ['name' => 'Class 1-B', 'section' => 'B'],
            ['name' => 'Class 2-A', 'section' => 'A'],
            ['name' => 'Class 2-B', 'section' => 'B'],
            ['name' => 'Class 3-A', 'section' => 'A'],
            ['name' => 'Class 3-B', 'section' => 'B'],
            ['name' => 'Class 4-A', 'section' => 'A'],
            ['name' => 'Class 4-B', 'section' => 'B'],
            ['name' => 'Class 5-A', 'section' => 'A'],
            ['name' => 'Class 5-B', 'section' => 'B'],
        ];

        foreach ($classes as $class) {
            Classroom::create([
                'name' => $class['name'],
                'section' => $class['section'],
                'academic_year' => now()->year,
                'capacity' => $faker->numberBetween(30, 50),
                'class_teacher' => $faker->name(),
                'room_number' => 'Room-' . $faker->numberBetween(101, 500),
                'description' => $faker->sentence(),
                'is_active' => $faker->boolean(90),
            ]);
        }
    }
}

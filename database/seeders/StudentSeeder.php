<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $classes = Classroom::all();

        $userId = User::first()->id;

        foreach ($classes as $class) {

            for ($i = 1; $i <= 20; $i++) {

                Student::create([
                    'class_id' => $class->id,

                    'enrollment_number' => now()->year . '-' . uniqid(),

                    'first_name' => $faker->firstName(),
                    'last_name' => $faker->lastName(),

                    'email' => $faker->unique()->safeEmail(),

                    'date_of_birth' => $faker->dateTimeBetween('-15 years', '-5 years'),

                    'gender' => $faker->randomElement(['Male', 'Female', 'Other']),

                    'address' => $faker->address(),

                    'phone' => $faker->phoneNumber(),

                    'parent_name' => $faker->name(),

                    'parent_phone' => $faker->phoneNumber(),

                    'blood_group' => $faker->randomElement([
                        'A+',
                        'A-',
                        'B+',
                        'B-',
                        'AB+',
                        'AB-',
                        'O+',
                        'O-'
                    ]),

                    'roll_number' => $i,

                    'gpa' => $faker->randomFloat(2, 2, 4),

                    'created_by' => $userId,
                    'updated_by' => $userId,
                ]);
            }
        }
    }
}

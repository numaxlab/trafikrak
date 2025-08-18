<?php

namespace Trafikrak\Database\Factories\Education;

use Illuminate\Database\Eloquent\Factories\Factory;
use Trafikrak\Models\Education\Course;

class InstructorFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'name' => 'Test Instructor',
        ];
    }
}

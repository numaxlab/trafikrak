<?php

namespace Trafikrak\Database\Factories\Education;

use Illuminate\Database\Eloquent\Factories\Factory;
use Trafikrak\Models\Education\Course;
use Trafikrak\Models\Education\CourseDeliveryMethod;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'name' => 'Test Course',
            'subtitle' => 'Test Course Subtitle',
            'description' => 'Test Course Description',
            'starts_at' => now(),
            'ends_at' => now()->addDays(7),
            'delivery_method' => CourseDeliveryMethod::ONLINE,
            'location' => 'Test Location',
            'is_published' => true,
            'topic_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

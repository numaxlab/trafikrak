<?php

namespace Trafikrak\Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;
use Trafikrak\Models\Content\Page;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(6),
            'intro' => $this->faker->sentences(rand(3, 8)),
            'description' => $this->faker->paragraph,
            'content' => [
                [
                    'name' => $this->faker->words(4),
                    'description' => $this->faker->paragraph,
                    'action' => $this->faker->url,
                    'action_tag' => $this->faker->word,
                ],
            ],
            'is_published' => true,
        ];
    }
}

<?php

namespace Testa\Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;
use Testa\Models\Content\Banner;
use Testa\Models\Content\BannerType;

class BannerFactory extends Factory
{
    protected $model = Banner::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(rand(3, 8)),
            'type' => BannerType::CONTAINED->value,
            'description' => $this->faker->paragraph(rand(3, 8)),
            'link' => $this->faker->url(),
            'button_text' => $this->faker->word(),
            'is_published' => true,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Link;
use App\Models\Visit;

class VisitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'link_id' => Link::factory(),
            'request_method' => $this->faker->word,
            'device' => $this->faker->word,
            'protocol' => $this->faker->word,
            'user_agent' => $this->faker->word,
            'ip' => $this->faker->word,
            'softdeletes' => $this->faker->word,
        ];
    }
}

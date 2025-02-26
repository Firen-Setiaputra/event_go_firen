<?php

namespace Database\Factories;

use Illuminate\Container\Attributes\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_acara' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->text(),
            'tanggal_acara' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'lokasi' => $this->faker->address(),
            'poster' => 'posters' . basename($this->faker->image(storage_path('app/public/posters'), 640, 480, null, false)), 
            'kapasitas_maksimal' => $this->faker->randomNumber(2,true),
        ];
    }
}

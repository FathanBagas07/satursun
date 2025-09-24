<?php

namespace Database\Factories;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
    protected $model = JobListing::class;

    public function definition(): array
    {
        return [
            // secara default buat poster baru (role poster). Nanti bisa dioverride di seeder.
            'poster_id'   => User::factory()->state(['role' => 'poster']),
            'title'       => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(3),
            'deadline'    => $this->faker->optional()->dateTimeBetween('now', '+2 months'),
            'location'    => $this->faker->optional()->city(),
            'status'      => 'open',
        ];
    }
}

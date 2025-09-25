<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\JobListing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $poster = User::firstOrCreate(
            ['email' => 'poster@satursun.test'],
            ['name' => 'Demo Poster', 'password' => Hash::make('password'), 'role' => 'poster']
        );

        $freel = User::firstOrCreate(
            ['email' => 'freelancer@satursun.test'],
            ['name' => 'Demo Freelancer', 'password' => Hash::make('password'), 'role' => 'freelancer']
        );

        JobListing::factory()
            ->count(3)
            ->state(['poster_id' => $poster->id]) // pakai poster yang barusan dibuat
            ->create();


        JobListing::factory()->count(0); // jika pakai factory

        foreach (
            [
                ['title' => 'Landing Page Company', 'description' => 'Build LP Tailwind', 'location' => 'Remote'],
                ['title' => 'Logo & Brand Guide',   'description' => 'Logo + basic guideline', 'location' => 'Remote'],
                ['title' => 'REST API Laravel',     'description' => 'CRUD + Auth', 'location' => 'Remote'],
            ] as $j
        ) {
            JobListing::create($j + [
                'poster_id' => $poster->id,
                'status' => 'open',
            ]);
        }
    }
}

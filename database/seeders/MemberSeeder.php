<?php

namespace Database\Seeders;

use App\Models\Gym;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gym::all()->each(function (Gym $gym) {
            Member::factory()->count(10)->create([
                'gym_id' => $gym->id,
            ]);
        });
    }
}

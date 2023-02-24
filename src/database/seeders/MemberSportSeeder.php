<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = Sport::all();

        User::all()->each(function ($user) use ($sports) {
            $user->sports()->attach(
                $sports->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}

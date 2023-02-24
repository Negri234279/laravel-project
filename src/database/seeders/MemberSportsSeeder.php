<?php

namespace Database\Seeders;

use App\Models\MemberSport;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = User::all();
        $sports = Sport::all();
        
        foreach ($users as $user) {
            $sportsIds = $sports->pluck('id')->shuffle()->take(rand(2, 5))->toArray();
            
            foreach ($sportsIds as $sportId) {
                MemberSport::create([
                    'user_id' => $user->id,
                    'sport_id' => $sportId,
                ]);
            }
        }
    }
}

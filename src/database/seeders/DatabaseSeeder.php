<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'sports',
            'users'
        ]);

        $this->call([
            SportSeeder::class,
            UsersTableSeeder::class,
        ]);
    }

    /**
     * Truncate the specified tables.
     *
     * @param  array  $tables
     * @return void
     */
    protected function truncateTables(array $tables)
    {
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
    }
}

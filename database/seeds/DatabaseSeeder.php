<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Administrator',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'email' => 'admin@firecert.com'
        ]);

        $this->call(PremiseTypeSeeder::class);
        $this->call(PremiseCategorySeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(StateCitySeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(PremiseDetailSeeder::class);

    }
}

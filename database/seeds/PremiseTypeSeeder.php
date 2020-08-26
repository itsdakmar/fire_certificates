<?php

use Illuminate\Database\Seeder;

class PremiseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PremiseType::create([
            'name' => 'Swasta'
        ]);

        \App\PremiseType::create([
            'name' => 'Kerajaan'
        ]);
    }
}

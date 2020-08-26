<?php

use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Zone::create([
            'name'=>'Z1MK',
            'full_name'=>'Zon 1 Melaka Tengah'
        ]);

        \App\Zone::create([
            'name'=>'Z2MK',
            'full_name'=>'Zon 2 Melaka Tengah'
        ]);
    }
}

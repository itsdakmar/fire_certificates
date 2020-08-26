<?php

use Illuminate\Database\Seeder;

class PremiseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PremiseCategory::create([
            'name'=>'Perpustakaan'
        ]);

        \App\PremiseCategory::create([
            'name'=>'Hospital & Rumah Rawatan'
        ]);

        \App\PremiseCategory::create([
            'name'=>'Hotel'
        ]);

        \App\PremiseCategory::create([
            'name'=>'Asrama & Domitori'
        ]);

        \App\PremiseCategory::create([
            'name'=>'Pejabat'
        ]);

        \App\PremiseCategory::create([
            'name'=>'Kedai'
        ]);

        \App\PremiseCategory::create([
            'name'=>'Kilang'
        ]);

        \App\PremiseCategory::create([
            'name'=>'Tempat Perhimpunan'
        ]);

        \App\PremiseCategory::create([
            'name'=>'Storan & Am'
        ]);


    }
}

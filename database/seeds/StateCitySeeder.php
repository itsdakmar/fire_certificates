<?php

use App\City;
use App\State;
use Illuminate\Database\Seeder;

class StateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(public_path('all.json'));
        $json = json_decode($file, true);

        foreach ($json as $key => $state){
            foreach ($state as $negeri){
                $state = State::create(['name' => $negeri['name']]);
                foreach ($negeri['city'] as $city){
                    City::create(['name' => $city['name'], 'state_id' => $state->id]);
                }
            }

        }

        City::create([
            'name'=>'Batang Melaka',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Bukit Beruang',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Bukit Katil',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Cheng',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Hang Tuah Jaya',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Klebang',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Krubong',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Lendu',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Machap Baru',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Melaka Pindah',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Naning',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Nyalas',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Pulau Sebang',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Ramuan China',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Serkam',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Simpang Ampat',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Tampin',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Tanjung Bidara',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Tanjung Tuan',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Telok Mas',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Umbai',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Bandar Utama Cheng',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Malim Jaya',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Melaka Raya',
            'state_id'=>5
        ]);

        City::create([
            'name'=>'Bandar Jasin Bestari',
            'state_id'=>5
        ]);
    }
}

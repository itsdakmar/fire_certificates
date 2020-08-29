<?php

use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Office::create([
            'name'=>'Jalan Kubu',
            'address_1'=>'Jalan Kubu',
            'address_2'=>'',
            'city_id'=>'123',
            'postcode'=>'75200',
            'zone_id'=>'1'
        ]);

        \App\Office::create([
            'name'=>'Ayer Keroh',
            'address_1'=>'Jalan Ayer Keroh Lama',
            'address_2'=>'',
            'city_id'=>'445',
            'postcode'=>'75450',
            'zone_id'=>'1'
        ]);

        \App\Office::create([
            'name'=>'Bukit Katil',
            'address_1'=>'Jalan Tun Hamzah',
            'address_2'=>'',
            'city_id'=>'446',
            'postcode'=>'754507',
            'zone_id'=>'1'
        ]);

        \App\Office::create([
            'name'=>'Jasin',
            'address_1'=>'Jalan Jasin',
            'address_2'=>'',
            'city_id'=>'118',
            'postcode'=>'77000',
            'zone_id'=>'1'
        ]);

        \App\Office::create([
            'name'=>'Merlimau',
            'address_1'=>'Jalan Batu Gajah',
            'address_2'=>'',
            'city_id'=>'124',
            'postcode'=>'77300',
            'zone_id'=>'1'
        ]);

        \App\Office::create([
            'name'=>'Tangga Batu',
            'address_1'=>'Jalan Bukit Rambai',
            'address_2'=>'',
            'city_id'=>'123',
            'postcode'=>'75250',
            'zone_id'=>'1'
        ]);

        \App\Office::create([
            'name'=>'Jasin Bestari',
            'address_1'=>'Jalan Taman Maju',
            'address_2'=>'',
            'city_id'=>'118',
            'postcode'=>'77000',
            'zone_id'=>'1'
        ]);

        \App\Office::create([
            'name'=>'Alor Gajah',
            'address_1'=>'Jalan Kelemak',
            'address_2'=>'',
            'city_id'=>'113',
            'postcode'=>'78000',
            'zone_id'=>'2'
        ]);

        \App\Office::create([
            'name'=>'Masjid Tanah',
            'address_1'=>'Bt 17',
            'address_2'=>'Jalan Solok Duku',
            'city_id'=>'122',
            'postcode'=>'78300',
            'zone_id'=>'2'
        ]);

    }
}

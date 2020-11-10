<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        \App\User::create([
            'name' => 'Pegawai 1',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'email' => 'shuhada@firecert.com'
        ]);
    }
}

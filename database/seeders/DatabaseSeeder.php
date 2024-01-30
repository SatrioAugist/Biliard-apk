<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /** 
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Satrio Augistiawan',
            'username' => 'admin',
            'password' => Hash::make ('admin'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Egi Renaldi',
            'username' => 'teller',
            'password' => Hash::make ('teller'),
            'role' => 'teller'
        ]);
        DB::table('users')->insert([
            'name' => 'Udin Gaclek',
            'username' => 'kasir',
            'password' => Hash::make ('kasir'),
            'role' => 'kasir'
        ]);
        DB::table('users')->insert([
            'name' => 'Satset Augs',
            'username' => 'owner',
            'password' => Hash::make ('owner'),
            'role' => 'owner'
        ]);
    }
}

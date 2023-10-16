<?php

namespace Database\Seeders;

use App\Models\Nis;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Nis::create([
        //     'nama' => 'Indi Riska Maharani',
        //     'nis' => '212210266'
        // ]);
        // Nis::create([
        //     'nama' => 'Ristina Apriliani',
        //     'nis' => '212210280'
        // ]);
        // Nis::create([
        //     'nama' => 'Anita Novitasari',
        //     'nis' => '212210255'
        // ]);
        Nis::create([
            'nama' => 'Adinda',
            'nis' => '212210210'
        ]);

        // Role::create([
        //     'role_name' => 'superadmin',
        // ]);

        // Role::create([
        //     'role_name' => 'pegawai',
        // ]);

        // Role::create([
        //     'role_name' => 'user',
        // ]);

       
    }
}
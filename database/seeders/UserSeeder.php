<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed admin user
        User::create([
            'kode' => 'K-100001',
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // Ubah 'password' menjadi password yang diinginkan
            'level' => 'admin',
        ]);

        // Seed kasir user
        User::create([
            'kode' => 'K-100002',
            'nama' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('password'), // Ubah 'password' menjadi password yang diinginkan
            'level' => 'kasir',
        ]);

        // Seed owner user
        User::create([
            'kode' => 'K-100003',
            'nama' => 'Henry',
            'email' => 'henry@gmail.com',
            'password' => bcrypt('subakbelaki'), // Ubah 'password' menjadi password yang diinginkan
            'level' => 'admin',
        ]);

        // Seed other users here if needed
    }
}

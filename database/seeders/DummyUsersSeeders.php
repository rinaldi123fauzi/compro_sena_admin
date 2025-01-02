<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [[
            'name' => 'Donna Firmansyah',
            'nip' => '123456789',
            'phone' => '085727247161',
            'email' => 'firmansyahdonna@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123456')
        ]];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}

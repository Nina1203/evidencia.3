<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Sales'],
            ['name' => 'Purchasing'],
            ['name' => 'Warehouse'],
            ['name' => 'Route']
        ];
        DB::table('roles')->insert($roles);
    }
}

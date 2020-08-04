<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'Admin',
            'status' => 'Active'
        ]);
        DB::table('roles')->insert([
            'role' => 'Manager',
            'status' => 'Active'
        ]);
        DB::table('roles')->insert([
            'role' => 'User',
            'status' => 'Active'

        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            ['id'=>1, 'division_name'=>'Dhaka'],
            ['id'=>2, 'division_name'=>'Chattagram'],
            ['id'=>3, 'division_name'=>'Rajshahi'],
            ['id'=>4, 'division_name'=>'Khulna'],
            ['id'=>5, 'division_name'=>'Barishal'],
            ['id'=>6, 'division_name'=>'Sylhet'],
            ['id'=>7, 'division_name'=>'Rangpur'],
            ['id'=>8, 'division_name'=>'Mymensingh'],
        ]);
    }
}

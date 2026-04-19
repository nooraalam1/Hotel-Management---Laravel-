<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            [
                'location' => 'West Medda, Noyapara, HN: 676',
                'division' => 'Chattagram',
                'district' => 18,
                'phone' => '+8801709117776',
                'email' => 'brahmanbaria@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'location' => 'Uttara Sector 10',
                'division' => 'Dhaka',
                'district' => 1,
                'phone' => '+8801700000001',
                'email' => 'uttara@hotel.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

            [
                'location' => 'Dhanmondi 27',
                'division' => 'Dhaka',
                'district' => 1,
                'phone' => '+8801700000002',
                'email' => 'dhanmondi@hotel.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

            [
                'location' => 'Coxs Bazar Sea Beach',
                'division' => 'Chattogram',
                'district' => 15,
                'phone' => '+8801700000003',
                'email' => 'coxsbazar@hotel.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}

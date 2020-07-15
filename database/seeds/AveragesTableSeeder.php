<?php

use Illuminate\Database\Seeder;

class AveragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '0',
            'age_to' => '30',
            'weight' => '3.0',
            'height' => '48.7',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '31',
            'age_to' => '60',
            'weight' => '4.8',
            'height' => '55.5',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '61',
            'age_to' => '90',
            'weight' => '5.8',
            'height' => '59.0',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '91',
            'age_to' => '120',
            'weight' => '6.6',
            'height' => '61.9',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '121',
            'age_to' => '150',
            'weight' => '7.2',
            'height' => '64.3',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '151',
            'age_to' => '180',
            'weight' => '7.7',
            'height' => '66.2',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '181',
            'age_to' => '210',
            'weight' => '8.0',
            'height' => '67.9',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '211',
            'age_to' => '240',
            'weight' => '8.3',
            'height' => '69.3',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '241',
            'age_to' => '270',
            'weight' => '8.5',
            'height' => '70.6',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '271',
            'age_to' => '300',
            'weight' => '8.7',
            'height' => '71.8',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '301',
            'age_to' => '330',
            'weight' => '8.9',
            'height' => '72.9',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '331',
            'age_to' => '365',
            'weight' => '9.1',
            'height' => '73.9',
        ]);
        
        
    }
}

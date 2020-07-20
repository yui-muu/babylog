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
            'perday' => '25',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '31',
            'age_to' => '60',
            'weight' => '4.8',
            'height' => '55.5',
            'perday' => '25',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '61',
            'age_to' => '90',
            'weight' => '5.8',
            'height' => '59.0',
            'perday' => '25',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '91',
            'age_to' => '120',
            'weight' => '6.6',
            'height' => '61.9',
            'perday' => '15',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '121',
            'age_to' => '150',
            'weight' => '7.2',
            'height' => '64.3',
            'perday' => '15',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '151',
            'age_to' => '180',
            'weight' => '7.7',
            'height' => '66.2',
            'perday' => '15',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '181',
            'age_to' => '210',
            'weight' => '8.0',
            'height' => '67.9',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '211',
            'age_to' => '240',
            'weight' => '8.3',
            'height' => '69.3',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '241',
            'age_to' => '270',
            'weight' => '8.5',
            'height' => '70.6',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '271',
            'age_to' => '300',
            'weight' => '8.7',
            'height' => '71.8',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '301',
            'age_to' => '330',
            'weight' => '8.9',
            'height' => '72.9',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Boy',
            'age_from' => '331',
            'age_to' => '365',
            'weight' => '9.1',
            'height' => '73.9',
            'perday' => '10',
        ]);
        
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '0',
            'age_to' => '30',
            'weight' => '2.9',
            'height' => '48.3',
            'perday' => '25',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '31',
            'age_to' => '60',
            'weight' => '4.5',
            'height' => '54.5',
            'perday' => '25',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '61',
            'age_to' => '90',
            'weight' => '5.4',
            'height' => '57.8',
            'perday' => '25',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '91',
            'age_to' => '120',
            'weight' => '6.2',
            'height' => '60.6',
            'perday' => '15',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '121',
            'age_to' => '150',
            'weight' => '6.7',
            'height' => '62.9',
            'perday' => '15',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '151',
            'age_to' => '180',
            'weight' => '7.2',
            'height' => '64.8',
            'perday' => '15',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '181',
            'age_to' => '210',
            'weight' => '7.5',
            'height' => '66.4',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '211',
            'age_to' => '240',
            'weight' => '7.8',
            'height' => '67.9',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '241',
            'age_to' => '270',
            'weight' => '8.0',
            'height' => '69.1',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '271',
            'age_to' => '300',
            'weight' => '8.2',
            'height' => '70.3',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '301',
            'age_to' => '330',
            'weight' => '8.4',
            'height' => '71.3',
            'perday' => '10',
        ]);
        DB::table('averages')->insert([
            'gender' => 'Girl',
            'age_from' => '331',
            'age_to' => '365',
            'weight' => '8.5',
            'height' => '72.3',
            'perday' => '10',
        ]);
        
        
    } 
}
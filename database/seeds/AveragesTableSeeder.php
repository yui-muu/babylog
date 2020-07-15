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
            'gender' => 'G',
            'age_from' => '0',
            'age_to' => '30',
            'weight' => '2.9',
            'height' => '48.3',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '31',
            'age_to' => '60',
            'weight' => '4.5',
            'height' => '54.5',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '61',
            'age_to' => '90',
            'weight' => '5.4',
            'height' => '57.8',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '91',
            'age_to' => '120',
            'weight' => '6.2',
            'height' => '60.6',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '121',
            'age_to' => '150',
            'weight' => '6.7',
            'height' => '62.9',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '151',
            'age_to' => '180',
            'weight' => '7.2',
            'height' => '64.8',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '181',
            'age_to' => '210',
            'weight' => '7.5',
            'height' => '66.4',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '211',
            'age_to' => '240',
            'weight' => '7.8',
            'height' => '67.9',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '241',
            'age_to' => '270',
            'weight' => '8.0',
            'height' => '69.1',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '271',
            'age_to' => '300',
            'weight' => '8.2',
            'height' => '70.3',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '301',
            'age_to' => '330',
            'weight' => '8.4',
            'height' => '71.3',
        ]);
        DB::table('averages')->insert([
            'gender' => 'G',
            'age_from' => '331',
            'age_to' => '365',
            'weight' => '8.5',
            'height' => '72.3',
        ]);
        
        
    }
}

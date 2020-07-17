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
        DB::table('averages')->where('id', 1)
        ->update(['perday' => '25',
        ]);
        DB::table('averages')->where('id', 2)
        ->update(['perday' => '25',
        ]);
        DB::table('averages')->where('id', 3)
        ->update(['perday' => '25',
        ]);
        DB::table('averages')->where('id', 4)
        ->update(['perday' => '15',
        ]);
        DB::table('averages')->where('id', 5)
        ->update(['perday' => '15',
        ]);
        DB::table('averages')->where('id', 6)
        ->update(['perday' => '15',
        ]);
        DB::table('averages')->where('id', 7)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 8)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 9)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 10)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 11)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 12)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 13)
        ->update(['perday' => '25',
        ]);
        DB::table('averages')->where('id', 14)
        ->update(['perday' => '25',
        ]);
        DB::table('averages')->where('id', 15)
        ->update(['perday' => '25',
        ]);
        DB::table('averages')->where('id', 16)
        ->update(['perday' => '15',
        ]);
        DB::table('averages')->where('id', 17)
        ->update(['perday' => '15',
        ]);
        DB::table('averages')->where('id', 18)
        ->update(['perday' => '15',
        ]);
        DB::table('averages')->where('id', 19)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 20)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 21)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 22)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 23)
        ->update(['perday' => '10',
        ]);
        DB::table('averages')->where('id', 24)
        ->update(['perday' => '10',
        ]);
        
        
    }
}

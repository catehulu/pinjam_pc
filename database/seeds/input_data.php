<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class input_data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for ($i=0; $i < 20; $i++) {
            DB::table('data')->insert([
                'NRP' => str_random(14),
                'nama' => str_random(10),
                'No_Telp' => str_random(10),
                'Email' => str_random(10).'@gmial.com',
                'Dosbing' => str_random(10),
                'NIP' => str_random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

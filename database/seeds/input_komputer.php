<?php

use Illuminate\Database\Seeder;
use Pinjam\Komputer;

class input_komputer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 12; $i++) { 
            Komputer::create([
                
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class SeederProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'nameproduct' => str_random(10),
            'value' => str_random(10),
        ]);
    }
}

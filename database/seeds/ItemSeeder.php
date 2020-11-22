<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_code_colors')->insert([
            [
                'id'=>1,
                'color' => 'Red',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'color' => 'Black',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'color' => 'White',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],

        ]);

        DB::table('item_code_sizes')->insert([
            [
                'id'=>1,
                'size' => 'S',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'size' => 'M',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'size' => 'L',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],

        ]);
    }
}
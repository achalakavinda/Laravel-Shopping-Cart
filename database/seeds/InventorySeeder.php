<?php

use App\Models\Ims\Brand;
use App\Models\Ims\ItemCode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_codes')->insert([
            [
                'id'=>1,
                'name' => 'Blue Leaf Abstract',
                'brand_id' => 1,
                'thumbnail_url' => '/img/product-img/1.jpg',
                'description'=>'The perfect Island shirt for any occasion!',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name' => 'Black Leaf Abstract',
                'brand_id' => 1,
                'thumbnail_url' => '/img/product-img/2.jpg',
                'description'=>'The perfect Island shirt for any occasion!',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'name' => 'Color Stripes',
                'brand_id' => 1,
                'thumbnail_url' => '/img/product-img/3.jpg',
                'description'=>'The perfect Island shirt for any occasion!',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'name' => 'Black Leaf Abstract',
                'brand_id' => 1,
                'thumbnail_url' => '/img/product-img/4.jpg',
                'description'=>'The perfect Island shirt for any occasion!',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],

        ]);
    }
}
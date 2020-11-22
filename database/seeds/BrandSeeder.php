<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'id'=>1,
                'name' => 'Shirts',
                'slug' => 'shirts',
                'img_url' => '/img/product-img/1.jpg',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name' => 'Dresses',
                'slug' => 'dresses',
                'img_url' => '/img/brand-img/2-dresses.png',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'name' => 'Wide-brim hat',
                'slug' => 'wide-brim-hat',
                'img_url' => '/img/brand-img/3-wide-brim-hat.png',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'name' => 'Swim suits',
                'slug' => 'swim-suits',
                'img_url' => '/img/brand-img/4-swim-suits.png',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>5,
                'name' => 'Clutch or wristlet',
                'slug' => 'clutch-or-wristlet',
                'img_url' => '/img/brand-img/5-clutch-or-wristlet.png',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'id'=>6,
                'name' => 'Work wear',
                'slug' => 'work-wear',
                'img_url' => '/img/brand-img/6-work-wear.png',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],

        ]);
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_measurements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });


        Schema::create('item_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('brand_id');
            $table->string('description')->nullable();

            $table->text('thumbnail_url')->default("/img/product-img/3.jpg");

            $table->float('unit_cost')->default(1000);
            $table->float('selling_price')->default(1500);

            $table->timestamps();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_codes');
        Schema::dropIfExists('type_measurements');
    }
}

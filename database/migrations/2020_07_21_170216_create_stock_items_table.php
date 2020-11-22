<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('stock_id');
            $table->unsignedInteger('item_code_id');
            $table->unsignedInteger('item_code_color_id')->nullable();
            $table->unsignedInteger('item_code_size_id')->nullable();
            $table->integer('open_qty')->default(0);
            $table->integer('remain_qty')->default(0);
            $table->float('cost')->nullable();
            $table->float('selling_price')->nullable();
            $table->timestamps();

            $table->foreign('stock_id')
                ->references('id')
                ->on('stocks');

            $table->foreign('item_code_id')
                ->references('id')
                ->on('item_codes');

            $table->foreign('item_code_color_id')
                ->references('id')
                ->on('item_code_colors');

            $table->foreign('item_code_size_id')
                ->references('id')
                ->on('item_code_sizes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_items');
    }
}
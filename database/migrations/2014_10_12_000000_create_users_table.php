<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['admin','customer'])->default('customer');
            $table->string('name');
            $table->string('img_url')->default("https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();

        });

        DB::table('users')->insert([
            [
                'id'=>1,
                'type'=>'admin',
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin123')
            ],
            [
                'id'=>2,
                'type'=>'customer',
                'name' => 'customer',
                'email' => 'customer@test.com',
                'password' => bcrypt('admin123')
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
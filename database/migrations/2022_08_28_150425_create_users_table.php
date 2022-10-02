<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('day_of_birth');
            $table->string('gender');
            $table->string('address');
            $table->foreignId('position_id')->constrained('positions');
            $table->foreignId('shop_id')->constrained('shops');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

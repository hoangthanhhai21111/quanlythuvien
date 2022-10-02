<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('quantity_management', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('shop_id')->constrained('shops');
            $table->integer('rent');
            $table->integer('sell');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('quantity_management');
    }
};

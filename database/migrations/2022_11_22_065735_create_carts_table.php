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
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productId')->unsigned()->index();
            $table->integer('userId')->unsigned()->index();
            $table->integer('quantity')->default(1);
            $table->float('total')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};

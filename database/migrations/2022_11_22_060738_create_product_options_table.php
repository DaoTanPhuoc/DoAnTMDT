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
        Schema::create('productOptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productId')->unsigned()->index();
            $table->integer('optionId')->unsigned()->index();
            $table->integer('optionGroupId')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('optionId')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_options');
    }
};

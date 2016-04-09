<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id_product',10);
            $table->dateTime('post_date_from');
            $table->dateTime('post_date_to');
            $table->string('category',20);
            $table->string('product_name',50);
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('on_order');
            $table->string('status');//A for posting and N to Unpost
            $table->timestamps();
            $table->primary('id_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}

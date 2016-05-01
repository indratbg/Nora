<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_order', function (Blueprint $table) {
            $table->string('id_product',10);
            $table->string('order_id',10);
            $table->string('order_by',50);
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total_payment');
            $table->string('address1',50);
            $table->string('address2',50);
            $table->string('address3',50);
            $table->timestamps();
          //  $table->primary('id_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_order');
    }
}

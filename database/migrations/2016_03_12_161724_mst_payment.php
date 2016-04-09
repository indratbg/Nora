<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_payment', function (Blueprint $table) {
            $table->string('order_id',10);
            $table->string('pay_with',10);
            $table->string('to_bank',10);
            $table->char('paid');//Y for already paid and N for unpaid
            $table->timestamps();
            $table->primary('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_payment');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MstPicture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_picture', function (Blueprint $table) {
            $table->string('id_product',10);
            $table->string('type',20);
            $table->string('title');
            $table->string('desc');
            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_picture');
    }
}

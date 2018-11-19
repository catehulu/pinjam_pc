<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigratingKomputerKedua extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komputer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_peminjam')->nullable()->unique()->unsigned();
            $table->timestamps();

            $table->foreign('id_peminjam')->references('id')->on('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komputer');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreirasESalariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreiras_e_salarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text')->nullable();
            $table->string('titulo', 240)->nullable();
            $table->text('descritivo')->nullable();
            $table->integer('arquivo')->nullable();
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
        Schema::dropIfExists('carreiras_e_salarios');
    }
}

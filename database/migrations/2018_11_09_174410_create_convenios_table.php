<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->increments('id');
            $table->char('ativo', 1)->default('S');
            $table->integer('order')->nullable();
            $table->string('name', 240)->nullable();
            $table->integer('categoria')->nullable();
            $table->text('description')->nullable();
            $table->string('endereco', 240)->nullable();
            $table->string('fone', 30)->nullable();
            $table->string('email', 240)->nullable();
            $table->string('site', 240)->nullable();

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
        Schema::dropIfExists('convenios');
    }
}

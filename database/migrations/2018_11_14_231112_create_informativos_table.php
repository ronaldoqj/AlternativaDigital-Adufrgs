<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informativos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->nullable();
            $table->string('codigo', 240)->nullable();
            $table->string('titulo', 240)->nullable();
            $table->text('descricao')->nullable();
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
        Schema::dropIfExists('informativos');
    }
}

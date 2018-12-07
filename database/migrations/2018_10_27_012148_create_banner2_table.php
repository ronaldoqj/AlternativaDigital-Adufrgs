<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanner2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->nullable();
            $table->char('ativo', 1)->default('S');
            $table->text('text')->nullable();
            $table->integer('image')->nullable();
            $table->string('legenda', 240)->nullable();
            $table->string('link', 240)->nullable();
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
        Schema::dropIfExists('banner2');
    }
}

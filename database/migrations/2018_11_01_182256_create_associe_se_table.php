<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssocieSeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associe_se', function (Blueprint $table) {
            $table->increments('id');

            $table->char('enviado', 1)->default('N');
            $table->string('nome', 240)->nullable();
            $table->string('email', 240)->nullable();
            $table->string('data_de_nascimento', 240)->nullable();
            $table->string('rg', 240)->nullable();
            $table->string('cpf', 240)->nullable();
            $table->string('cep', 240)->nullable();
            $table->string('endereco', 240)->nullable();
            $table->string('numero', 240)->nullable();
            $table->string('complemento', 240)->nullable();
            $table->string('bairro', 240)->nullable();
            $table->string('cidade', 240)->nullable();
            $table->string('siape', 240)->nullable();
            $table->string('identificacao_unica', 240)->nullable();
            $table->string('instituicao', 240)->nullable();
            $table->string('unidade', 240)->nullable();
            $table->string('departamento', 240)->nullable();
            $table->string('titulacao', 240)->nullable();
            $table->string('regime_de_trabalho', 240)->nullable();
            $table->string('vinculo', 240)->nullable();
            $table->string('vinculoDetalhes', 240)->nullable();
            $table->text('dependentes')->nullable();
            $table->string('data', 120)->nullable();

            $table->text('json')->nullable();
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
        Schema::dropIfExists('associe_se');
    }
}

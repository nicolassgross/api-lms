<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_curso', function (Blueprint $table) {
            $table->id('cd_curso');
            $table->string('cd_professor');
            $table->string('ds_nome')->unique();
            $table->string('me_ementa');
            $table->string('me_resumo');
            $table->string('imagem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ulms_curso');
    }
}
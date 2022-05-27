<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlmsCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulms_curso', function (Blueprint $table) {
            $table->id('cd_curso');
            $table->string('cd_coordenador');
            $table->string('ds_nome')->unique();
            $table->string('me_ementa');
            $table->string('me_resumo');
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

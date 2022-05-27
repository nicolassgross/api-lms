<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnimPessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unim_pessoa', function (Blueprint $table) {
            $table->id('cd_pessoa');
            $table->string('cd_cliente');
            $table->string('ds_nome');
            $table->string('ds_login')->unique();
            $table->string('ds_senha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unim_pessoa');
    }
}

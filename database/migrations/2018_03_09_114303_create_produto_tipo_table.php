<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_tipo', function (Blueprint $table) {
            $table->increments('id_produto_tipo');
            $table->string('no_produto_tipo');
            $table->string('ref_produto_tipo');
            $table->dateTime('dt_inicio')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dt_fim')->nullable();
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
        Schema::dropIfExists('produto_tipo');
    }
}

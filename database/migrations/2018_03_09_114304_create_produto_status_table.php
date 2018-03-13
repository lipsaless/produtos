<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_status', function (Blueprint $table) {
            $table->increments('id_produto_status');
            $table->string('no_produto_status');
            $table->string('ref_produto_status');
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
        Schema::dropIfExists('produto_status');
    }
}

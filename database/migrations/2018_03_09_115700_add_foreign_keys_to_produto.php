<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produto', function(Blueprint $table)
		{
            $table->foreign('id_produto_tipo', 'fk_produto_tipo__produto')->references('id_produto_tipo')->on('produto_tipo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_produto_status', 'fk_produto_status__produto')->references('id_produto_status')->on('produto_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto', function(Blueprint $table)
		{
            $table->dropForeign('fk_produto_tipo__produto');
            $table->dropForeign('fk_produto_status__produto');
		});
    }
}

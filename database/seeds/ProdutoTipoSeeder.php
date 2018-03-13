<?php

use Illuminate\Database\Seeder;

class ProdutoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [   
                'no_produto_tipo' => 'Limpeza',
                'ref_produto_tipo' => 'limpeza'
            ],
            [   
                'no_produto_tipo' => 'Alimento',
                'ref_produto_tipo' => 'alimento'
            ]
        ];

        DB::table('produto_tipo')->insert($dados);
    }
}

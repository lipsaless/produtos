<?php

use Illuminate\Database\Seeder;

class ProdutoStatusSeeder extends Seeder
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
                'no_produto_status' => 'Contém',
                'ref_produto_status' => 'Contém'
            ],
            [   
                'no_produto_status' => 'Em falta',
                'ref_produto_status' => 'em falta'
            ]
        ];

        DB::table('produto_status')->insert($dados);
    }
}

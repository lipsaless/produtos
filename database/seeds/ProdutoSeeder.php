<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create('pt_BR');
 
         $data = array();
 
             foreach (range(1,30) as $i) {
                 $data[] = [
                     'id_produto_tipo' => rand(1, 2),
                     'id_produto_status' => rand(1, 2),
                     'no_produto' => $faker->name,
                     'nu_preco' => $faker->randomFloat(),
                     'ds_produto' => $faker->sentence()
                 ];
             }
 
         DB::table('produto')->insert($data);
    }
}

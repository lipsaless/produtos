<?php

namespace App\Model;

use App\Model\Principal;

class Produto extends Principal
{
    protected $table = 'produto';
    protected $primaryKey = 'id_produto';

    public function buscar()
    {
        $query = $this->newQuery();
        $query->whereNull('produto.dt_fim');
        $query->join('produto_tipo', 'produto.id_produto_tipo', 'produto_tipo.id_produto_tipo');
        $query->select('produto.*', 'produto_tipo.no_produto_tipo');
        $query->orderBy('no_produto');

        return $query->get();
    }
}

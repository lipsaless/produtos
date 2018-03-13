<?php

namespace App\Model;

use App\Model\Principal;

class ProdutoTipo extends Principal
{
    protected $table = 'produto_tipo';
    protected $primaryKey = 'id_produto_tipo';

    public function buscar()
    {
        $query = $this->newQuery();
        $query->whereNull('dt_fim');
        $query->orderBy('dt_inicio');
        return $query->get();
    }
}

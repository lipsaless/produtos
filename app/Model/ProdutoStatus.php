<?php

namespace App\Model;

use App\Model\Principal;

class ProdutoStatus extends Principal
{
    protected $table = 'produto_status';
    protected $primaryKey = 'id_produto_status';

    public function buscar()
    {
        $query = $this->newQuery();
        $query->whereNull('dt_fim');
        $query->orderBy('dt_inicio');
        return $query->get();
    }
}

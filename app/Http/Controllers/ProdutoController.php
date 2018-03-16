<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Produto;
use App\Model\ProdutoTipo;
use App\Model\ProdutoStatus;

class ProdutoController extends Controller
{
    public $table = 'Produtos';

    public function principal()
    {
        $model = new Produto;
        $modelTipo = new ProdutoTipo;
        $tipos = $modelTipo->buscar();
        return view('produtos.principal', ['title' => $this->table, 'tipos' => $tipos]);
    }

    public function form()
    {
        $model = new Produto;
        $modelTipo = new ProdutoTipo;
        $modelStatus = new ProdutoStatus;

        $tipos = $modelTipo->buscar();
        $status = $modelStatus->buscar();

        return view('produtos.form', ['tipos' => $tipos, 'obj' => $model, 'status' => $status]);
    }

    public function gravar(Request $request)
    {
        $model = new Produto($request->all());
        $model->save();
    }

    public function listar(Request $request)
    {
        $model = new Produto;

        return $model->buscar($request->all());
    }

    public function editar($id)
    {
        $model = new Produto;
        $modelTipo = new ProdutoTipo;
        $modelStatus = new ProdutoStatus;

        $tipos = $modelTipo->buscar();
        $status = $modelStatus->buscar();
        $obj = $model->find($id);

        return view('produtos.form', ['tipos' => $tipos, 'obj' => $obj, 'status' => $status]);
    }

    public function excluir($id)
    {
        $model = new Produto;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();

        return response([]);
    }
}

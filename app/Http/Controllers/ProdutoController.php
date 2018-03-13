<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Produto;
use App\Model\ProdutoTipo;

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
        $modelTipo = new ProdutoTipo;
        $model = new Produto;
        $tipos = $modelTipo->buscar();
        return view('produtos.form', ['tipos' => $tipos, 'obj' => $model]);
    }

    public function gravar(Request $request)
    {
        $model = new Produto($request->all());
        $inserir = $model->save();
        
        if ($inserir) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }

    public function listar()
    {
        $model = new Produto;
        return $model->buscar();
    }

    public function editar($id)
    {
        $model = new Produto;
        $modelTipo = new ProdutoTipo;
        $tipos = $modelTipo->buscar();
        $obj = $model->find($id);
        return view('produtos.form', ['tipos' => $tipos, 'obj' => $obj ]);
    }

    public function excluir($id)
    {
        $model = new Produto;
        $obj = $model->find($id);
       // dd($model);
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();

        return response([]);
    }
}

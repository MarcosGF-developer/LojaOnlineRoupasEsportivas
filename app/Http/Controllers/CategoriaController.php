<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Categoria;

class CategoriaController extends Controller {
    
    public function lista(Request $req) {
        $categorias = new Categoria();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $categorias = $categorias->orderBy($ordem, 'asc');
        $categorias = $categorias->where($ordem, 'LIKE', "%$busca%");

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $categorias = $categorias->paginate($this->pag_size)->appends($vetor_parametros);

        return view('categoria.lista', [
            'categorias' => $categorias,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

    public function cadastro($id = 0) {

        if($id > 0){
            // Alterar
            $categoria = Categoria::find($id);
        } else {
            // Adicionar
            $categoria = new Categoria();
        }

        if ($categoria == null) { return redirect()->route('categoria_lista'); }

        return view('categoria.cadastro', [
            'categoria' => $categoria
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'nome' => 'required|min:3'
        ]);

        if($id > 0){
            $categoria = Categoria::find($id);
        } else {
            $categoria = new Categoria();
        }

        if ($categoria == null) { return redirect()->route('categoria_lista'); }

        $categoria->nome = $req->input('nome');
        $categoria->categoria_pai = $req->input('categoria_pai');
        $categoria->save();

        return redirect()->route('categoria_lista');
    }

    public function excluir($id){
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categoria_lista');
    }

}
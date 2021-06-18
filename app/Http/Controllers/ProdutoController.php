<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Produto;
use App\Models\FotoProduto;
use App\Models\Tamanho;
use App\Models\Categoria;
use Auth;


class ProdutoController extends Controller{

    public function lista(Request $req)
    {
        $produtos = new Produto();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $produtos = $produtos->orderBy($ordem, 'asc');
        $produtos = $produtos->where($ordem, 'LIKE', "%$busca%");

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $produtos = $produtos->paginate($this->pag_size)->appends($vetor_parametros);

        return view('produto.lista', [
            'produtos' => $produtos,
            'ordem' => $ordem,
            'busca' => $busca,
            'admin' => AppController::ehAdmin()
        ]);
    }

     public function cadastro($id = 0) {

        if($id > 0){
            // Alterar
            $produto = Produto::find($id);
        } else {
            // Adicionar
            $produto = new Produto();
        }

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $tamanhos = Tamanho::all();
        $categorias = Categoria::all();
        
        return view('produto.cadastro', [
            'produto' => $produto,
            'tamanhos'=>$tamanhos,
            'categorias'=>$categorias,

        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'nome' => 'required|min:3',
            'valor' => 'required|numeric',
        ]);

        if($id > 0){
            $produto = Produto::find($id);
        } else {
            $produto = new Produto();
        }

        if ($produto == null) { return redirect()->route('produto_lista'); }

        $id_tamanhos = $req->input('id_tamanhos');
        $id_categorias = $req->input('id_categorias');

        // Produto
        $produto->id_tamanhos = $id_tamanhos;
        $produto->id_categorias = $id_categorias;
        $produto->nome = $req->input('nome');
        $produto->descricao = $req->input('descricao');
        $produto->estoque = $req->input('estoque');
        $produto->valor = $req->input('valor');

        $slug = $produto->nome . " " . $produto->id;
        $slug = Str::slug($slug, '-');
        // $slug = $slug . "." . $imagem->extension();
        $produto->slug = $slug;

        $produto->save();

        return redirect()->route('produto_lista');


    }



    public function excluir($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produto_lista');
    }
}
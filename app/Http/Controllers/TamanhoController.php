<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Tamanho;

class TamanhoController extends Controller {
    
    public function lista(Request $req) {
        $tamanhos = new Tamanho();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $tamanhos = $tamanhos->orderBy($ordem, 'asc');
        $tamanhos = $tamanhos->where($ordem, 'LIKE', "%$busca%");

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $tamanhos = $tamanhos->paginate($this->pag_size)->appends($vetor_parametros);

        return view('tamanho.lista', [
            'tamanhos' => $tamanhos,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

    public function cadastro($id = 0) {

        if($id > 0){
            // Alterar
            $tamanho = Tamanho::find($id);
        } else {
            // Adicionar
            $tamanho = new Tamanho();
        }

        if ($tamanho == null) { return redirect()->route('tamanho_lista'); }

        return view('tamanho.cadastro', [
            'tamanho' => $tamanho
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'sigla' => 'required|min:1'
        ]);

        if($id > 0){
            $tamanho = Tamanho::find($id);
        } else {
            $tamanho = new Tamanho();
        }

        if ($tamanho == null) { return redirect()->route('tamanho_lista'); }

        $tamanho->sigla = $req->input('sigla');
        $tamanho->descricao = $req->input('descricao');
        $tamanho->save();

        return redirect()->route('tamanho_lista');
    }

    public function excluir($id){
        $tamanho = Tamanho::find($id);
        $tamanho->delete();
        return redirect()->route('tamanho_lista');
    }

}
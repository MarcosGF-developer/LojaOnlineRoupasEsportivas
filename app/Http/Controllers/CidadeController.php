<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Cidade;

class CidadeController extends Controller {
    
    public function lista(Request $req) {
        $cidades = new Cidade();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $cidades = $cidades->orderBy($ordem, 'asc');
        $cidades = $cidades->where($ordem, 'LIKE', "%$busca%");

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $cidades = $cidades->paginate($this->pag_size)->appends($vetor_parametros);

        return view('cidade.lista', [
            'cidades' => $cidades,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

    public function cadastro($id = 0) {

        if($id > 0){
            // Alterar
            $cidade = Cidade::find($id);
        } else {
            // Adicionar
            $cidade = new Cidade();
        }

        if ($cidade == null) { return redirect()->route('cidade_lista'); }

        return view('cidade.cadastro', [
            'cidade' => $cidade
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'nome' => 'required|min:3'
        ]);

        if($id > 0){
            $cidade = Cidade::find($id);
        } else {
            $cidade = new Cidade();
        }

        if ($cidade == null) { return redirect()->route('cidade_lista'); }

        $cidade->nome = $req->input('nome');
        $cidade->estado = $req->input('estado');
        $cidade->save();

        return redirect()->route('cidade_lista');
    }

    public function excluir($id){
        $cidade = Cidade::find($id);
        $cidade->delete();
        return redirect()->route('cidade_lista');
    }

}
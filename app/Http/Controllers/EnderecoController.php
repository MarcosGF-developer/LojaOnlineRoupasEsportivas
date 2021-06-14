<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Endereco;
use App\Models\Cidade;
use Auth;


class EnderecoController extends Controller
{
    
    public function lista(Request $req) {
        $id_clientes = (DB::table('clientes')->where('id_users', Auth::user()->id)->first())->id;
        $enderecos = new Endereco();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $enderecos = $enderecos->orderBy($ordem, 'asc');
        $enderecos = $enderecos->where($ordem, 'LIKE', "%$busca%");
        $enderecos = $enderecos->where('id_clientes', '=', $id_clientes);

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $enderecos = $enderecos->paginate($this->pag_size)->appends($vetor_parametros);

        return view('endereco.lista', [
            'enderecos' => $enderecos,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

    public function cadastro($id = 0) {

        if($id > 0){
            // Alterar
            $endereco = Endereco::find($id);

            $cliente = (DB::table('clientes')->where('id_users', Auth::user()->id)->first());
            if($cliente->id != $endereco->cliente->id){ return redirect()->route('endereco_lista'); }

        } else {
            // Adicionar
            $endereco = new Endereco();
        }

        if ($endereco == null) { return redirect()->route('endereco_lista'); }

        $cidades = Cidade::all();
        
        return view('endereco.cadastro', [
            'endereco' => $endereco,
            'cidades'=>$cidades
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'descricao' => 'required|min:3',
            'logradouro' => 'required|min:3',
            'numero' => 'required|min:1|max:4',
            'bairro' => 'required|min:3',
        ]);

        if($id > 0){
            $endereco = Endereco::find($id);
        } else {
            $endereco = new Endereco();
        }

        if ($endereco == null) { return redirect()->route('endereco_lista'); }
        
        $id_cidades = $req->input('id_cidades');
        $cliente = (DB::table('clientes')->where('id_users', Auth::user()->id)->first());

        $endereco->id_clientes = $cliente->id;
        $endereco->id_cidades = $id_cidades;
        $endereco->descricao = $req->input('descricao');
        $endereco->logradouro = $req->input('logradouro');
        $endereco->numero = $req->input('numero');
        $endereco->bairro = $req->input('bairro');

        $endereco->save();

        return redirect()->route('endereco_lista');
    }

    public function excluir($id){
        $endereco = Endereco::find($id);

        if ($endereco == null) { return redirect()->route('endereco_lista'); }

        $endereco->delete();
        return redirect()->route('endereco_lista');
    }
}
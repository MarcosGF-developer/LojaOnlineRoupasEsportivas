<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;


class CarrinhoController extends Controller
{
	

	function pre_compra($produto)
	{
		$produto = Produto::find($produto);

		$carrinho = session('carrinho.carrinho');

		return view('carrinho.carrinho', [
            'produto' => $produto, 
            'carrinho' => $carrinho
        ]);		


	}
	function finaliza_compra(request $req){

		$produto = Produto::find($req->input('id'));
        $informacoes = [
            'produto' => $produto,
            'quantidade' => $req->input('quantidade')
        ];

        if (!session()->exists('carrinho.carrinho')){
            $carrinho = [];
            $carrinho[] = $informacoes;
            session(['carrinho.carrinho' => $carrinho]);
        } else {
            $carrinho = session('carrinho.carrinho');

            $atualizacao = false;
            for($i=0; $i<count($carrinho); $i++){
                if ($carrinho[$i]['produto']->id == $produto->id){
                    $carrinho[$i]['quantidade'] += $informacoes['quantidade'];
                    $atualizacao = true;
                }
            }

            if (!$atualizacao){
                $carrinho[] = $informacoes;
            }
            
            session(['carrinho.carrinho' => $carrinho]);
        }

        return redirect()->route('lista_ecommerce');
	}
	function visualiza(){
		$produto = null;
		$carrinho = session('carrinho.carrinho');
		return view('carrinho.carrinho', [
            'produto' => $produto, 
            'carrinho' => $carrinho
        ]);
	}

    public function lista(Request $req) {
        $vendas = new Venda();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $vendas = $vendas->orderBy($ordem, 'asc');
        $vendas = $vendas->where($ordem, 'LIKE', "%$busca%");

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $vendas = $vendas->paginate($this->pag_size)->appends($vetor_parametros);

        return view('venda.lista', [
            'vendas' => $vendas,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

	function fecha_carrinho(){
		$venda = new Venda();
        $venda->valor_total = 0;
        $venda->quantidade_itens = 0;
        $venda->save();

        $carrinho = session('carrinho.carrinho');
        $valor_total = 0;

        foreach ($carrinho as $c){
            $valor_total += $c['produto']->valor_unitario * $c['quantidade'];

           
            $c['produto']->quantidade_atual -= $c['quantidade'];
            $c['produto']->save();

            $venda->produtos()->attach($c['produto']->id, [
                'quantidade' => $c['quantidade'],
                'subtotal' => $c['produto']->valor_unitario * $c['quantidade']
            ]);
        }

        $venda->quantidade_itens = count($carrinho);
        $venda->valor_total = $valor_total;
        $venda->save();

        session()->forget('carrinho');
        session()->flash('mensagem', 'Venda efetuada com sucesso');

		return redirect()->route('vendas');


		

	}

}
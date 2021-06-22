@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card text-white bg-dark">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2>Lista de <b>Produtos</b></h2>
                        </div>
                        
                        <div class="col">
                            <form>
                                <div class="input-group">
                                    <input type="hidden" name="ordem" value="{{ $ordem }}">
                                    <input class="btn btn-secondary" type="submit" value="Buscar">
                                    <input class="form-control" type="text" name="busca" autocomplete="off">
                                </div>
                            </form>
                        </div>
                        
                        <div class="col col-md-2 text-right">
                            <a href="{{ route('produto_cadastro') }}" class="btn btn-light">Adicionar</a>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="card-body">
                
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr class="table-ligth">
                                <th class="text-center"><a href="?ordem=id&busca={{ $busca }}">ID</a></th>
                                <th class="text-center"><a href="?ordem=nome&busca={{ $busca }}">Nome</a></th>
                                <th class="text-center"><a href="?ordem=descricao&busca={{ $busca }}">Descrição</a></th>
                                <th class="text-center"><a href="?ordem=quantidade_atual&busca={{ $busca }}">Estoque</a></th>
                                <th class="text-center"><a href="?ordem=valor_unitario&busca={{ $busca }}">Valor</a></th>
                                <th class="text-center">Tamanho</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Categoria Pai</th>
                                <th class="text-center">Imagem</th>
                                
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <th class="text-center">{{ $produto->id }}</td>
                                    <td class="text-center">{{ $produto->nome }}</td>
                                    <td class="text-center">{{ $produto->descricao }}</td>
                                    <td class="text-center">{{ $produto->quantidade_atual }}</td>
                                    <td class="text-center">{{ $produto->valor_unitario }}</td>
                                    <td class="text-center">{{ $produto->tamanhos->sigla }}</td>
                                    <td class="text-center">{{ $produto->categorias->nome }}</td>
                                    <td class="text-center">{{ $produto->categorias->categoria_pai }}</td>
                                    <td class="text-center">{{ $produto->caminho_imagem}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('produto_cadastro', $produto->id) }}" class="btn btn-sm btn-warning">Alterar</a>
                                        <a class="btn btn-sm btn-danger" href="#" onclick="exclui( {{ $produto->id }} )">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $produtos->links() }}

                </div>

            </div>

        </div>
    </div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o produto de id: " + id + "?")){
			location.href = "/produto/excluir/" + id;
		}
	}
</script>

@endsection
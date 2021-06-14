@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2>Lista de <b>Enderecos</b></h2>
                        </div>
                        
                        <div class="col">
                            <form>
                                <div class="input-group">
                                    <input type="hidden" name="ordem" value="{{ $ordem }}">
                                    <input class="btn btn-primary" type="submit" value="Buscar">
                                    <input class="form-control" type="text" name="busca" autocomplete="off">
                                </div>
                            </form>
                        </div>
                        
                        <div class="col col-md-2 text-right">
                            <a href="{{ route('endereco_cadastro') }}" class="btn btn-success">Adicionar</a>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="card-body">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center"><a href="?ordem=id_cidade&busca={{ $busca }}">Cidade</a></th>
                                <th class="text-center"><a href="?ordem=id&busca={{ $busca }}">ID</a></th>
                                <th class="text-center"><a href="?ordem=descricao&busca={{ $busca }}">Descrição</a></th>
                                <th class="text-center"><a href="?ordem=logradouro&busca={{ $busca }}">Logradouro</a></th>
                                <th class="text-center"><a href="?ordem=numero&busca={{ $busca }}">Número</a></th>
                                <th class="text-center"><a href="?ordem=bairro&busca={{ $busca }}">Bairro</a></th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enderecos as $endereco)
                                <tr>
                                    <th class="text-center">{{ $endereco->cidade->nome }}</td>
                                    <th class="text-center">{{ $endereco->id }}</td>
                                    <td class="text-center">{{ $endereco->descricao }}</td>
                                    <td class="text-center">{{ $endereco->logradouro }}</td>
                                    <td class="text-center">{{ $endereco->numero }}</td>
                                    <td class="text-center">{{ $endereco->bairro }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('endereco_cadastro', $endereco->id) }}" class="btn btn-sm btn-warning">Alterar</a>
                                        <a class="btn btn-sm btn-danger" href="#" onclick="exclui( {{ $endereco->id }} )">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $enderecos->links() }}

                </div>

            </div>

        </div>
    </div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o endereço de id: " + id + "?")){
			location.href = "/endereco/excluir/" + id;
		}
	}
</script>

@endsection
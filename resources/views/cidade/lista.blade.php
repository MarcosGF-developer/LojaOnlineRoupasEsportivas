@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2>Lista de <b>Cidades</b></h2>
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
                            <a href="{{ route('cidade_cadastro') }}" class="btn btn-success">Adicionar</a>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="card-body">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center"><a href="?ordem=id&busca={{ $busca }}">ID</a></th>
                                <th class="text-center"><a href="?ordem=nome&busca={{ $busca }}">Nome</a></th>
                                <th class="text-center"><a href="?ordem=estado&busca={{ $busca }}">Estado</a></th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cidades as $cidade)
                                <tr>
                                    <th class="text-center">{{ $cidade->id }}</td>
                                    <td class="text-center">{{ $cidade->nome }}</td>
                                    <td class="text-center">{{ $cidade->estado }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('cidade_cadastro', $cidade->id) }}" class="btn btn-sm btn-warning">Alterar</a>
                                        <a class="btn btn-sm btn-danger" href="#" onclick="exclui( {{ $cidade->id }} )">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $cidades->links() }}

                </div>

            </div>

        </div>
    </div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir a cidade de id: " + id + "?")){
			location.href = "/cidade/excluir/" + id;
		}
	}
</script>

@endsection
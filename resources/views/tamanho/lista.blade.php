@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card text-white bg-dark">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2>Lista de <b>Tamanhos</b></h2>
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
                            <a href="{{ route('tamanho_cadastro') }}" class="btn btn-light">Adicionar</a>
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
                                <th class="text-center"><a href="?ordem=nome&busca={{ $busca }}">Sigla</a></th>
                                <th class="text-center"><a href="?ordem=estado&busca={{ $busca }}">Descrição</a></th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tamanhos as $tamanho)
                                <tr>
                                    <th class="text-center">{{ $tamanho->id }}</td>
                                    <td class="text-center">{{ $tamanho->sigla }}</td>
                                    <td class="text-center">{{ $tamanho->descricao }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('tamanho_cadastro', $tamanho->id) }}" class="btn btn-sm btn-warning">Alterar</a>
                                        <a class="btn btn-sm btn-danger" href="#" onclick="exclui( {{ $tamanho->id }} )">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $tamanhos->links() }}

                </div>

            </div>

        </div>
    </div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o tamanho de id: " + id + "?")){
			location.href = "/tamanho/excluir/" + id;
		}
	}
</script>

@endsection
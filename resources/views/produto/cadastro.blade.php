@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card text-white bg-dark">
            
                <div class="card-header">
                    <h2>Cadastro de <b>Produtos</b></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('produto_salvar', $produto->id) }}" enctype="multipart/form-data"> 
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome', $produto->nome) }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao', $produto->descricao) }}" required autocomplete="descricao" autofocus>

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantidade_atual" class="col-md-4 col-form-label text-md-right">Estoque</label>

                            <div class="col-md-6">
                                <input id="quantidade_atual" type="text" class="form-control @error('quantidade_atual') is-invalid @enderror" name="quantidade_atual" value="{{ old('quantidade_atual', $produto->quantidade_atual) }}" required autocomplete="quantidade_atual" autofocus>

                                @error('quantidade_atual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor_unitario" class="col-md-4 col-form-label text-md-right">Valor</label>

                            <div class="col-md-6">
                                <input id="valor_unitario" type="text" class="form-control @error('valor_unitario') is-invalid @enderror" name="valor_unitario" value="{{ old('valor_unitario', $produto->valor_unitario) }}" required autocomplete="valor_unitario" autofocus>

                                @error('valor_unitario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tamanho" class="col-md-4 col-form-label text-md-right">Tamanho</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="id_tamanhos">
                                            @foreach($tamanhos as $tamanho)
                                                <option value="{{ $tamanho->id }}"> {{ $tamanho->sigla }} </option>
                                            @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoria</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="id_categorias">
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"> {{ $categoria->nome }} {{ $categoria->categoria_pai }} </option>
                                            @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">Imagem</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="imagem">
                                </div>
                        </div>
                        

                        @if($produto->id > 0)
                            <div class="form-group row mt-5">
                                
                                

                            </div>
                        @endif

                        <div class="form-group row m-5">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-light">Salvar</button>
                            </div>
                        </div>

                    </form>

                    <a href="{{ route('produto_lista') }}" class="btn btn-secondary">Voltar</a>

                </div>
            
            </div>

        </div>
    </div>
</div>
@endsection
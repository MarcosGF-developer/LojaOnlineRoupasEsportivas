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
                    <form method="POST" action="{{ route('produto_salvar', $produto->id) }}">
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
                            <label for="estoque" class="col-md-4 col-form-label text-md-right">Estoque</label>

                            <div class="col-md-6">
                                <input id="estoque" type="text" class="form-control @error('estoque') is-invalid @enderror" name="estoque" value="{{ old('estoque', $produto->estoque) }}" required autocomplete="estoque" autofocus>

                                @error('estoque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">Valor</label>

                            <div class="col-md-6">
                                <input id="valor" type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor', $produto->valor) }}" required autocomplete="valor" autofocus>

                                @error('valor')
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
                    

                        @if($produto->id > 0)
                            <div class="form-group row mt-5">
                                
                                <div class="col-3"></div>

                                <div class="col text-center">
                                    <a href="{{ route('fotos_produto_lista', $produto->id) }}" class="btn btn-sm btn-primary">
                                        <h5>Fotos</h5>
                                    </a>
                                </div>

                                

                                <div class="col-3"></div>

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
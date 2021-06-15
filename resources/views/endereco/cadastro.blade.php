@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card text-white bg-dark">
            
                <div class="card-header">
                    <h2>Cadastro de <b>Enderecos</b></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('endereco_salvar', $endereco->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">Cidade</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="id_cidades">
                                        @foreach($cidades as $cidade)
                                            <option value="{{ $cidade->id }}">  {{ $cidade->id }} {{ $cidade->nome }} </option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao', $endereco->descricao) }}" required autocomplete="descricao" autofocus>

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logradouro" class="col-md-4 col-form-label text-md-right">Logradouro</label>

                            <div class="col-md-6">
                                <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{ old('logradouro', $endereco->logradouro) }}" required autocomplete="logradouro" autofocus>

                                @error('logradouro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">Número</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero', $endereco->numero) }}" required autocomplete="numero" autofocus>

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro', $endereco->bairro) }}" required autocomplete="bairro" autofocus>

                                @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-light">Salvar</button>
                            </div>
                        </div>

                    </form>

                    <a href="{{ route('endereco_lista') }}" class="btn btn-secondary">Voltar</a>

                </div>
            
            </div>

        </div>
    </div>
</div>
@endsection
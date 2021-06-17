@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card text-white bg-dark">
            
                <div class="card-header">
                    <h2>Cadastro de <b>Tamanhos</b></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tamanho_salvar', $tamanho->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="sigla" class="col-md-4 col-form-label text-md-right">Sigla</label>

                            <div class="col-md-6">
                                <input id="sigla" type="text" class="form-control @error('sigla') is-invalid @enderror" name="sigla" value="{{ old('sigla', $tamanho->sigla) }}" required autocomplete="sigla" autofocus>

                                @error('sigla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao', $tamanho->descricao) }}" required autocomplete="descricao" autofocus>

                                @error('descricao')
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

                    <a href="{{ route('tamanho_lista') }}" class="btn btn-secondary">Voltar</a>

                </div>
            
            </div>

        </div>
    </div>
</div>
@endsection
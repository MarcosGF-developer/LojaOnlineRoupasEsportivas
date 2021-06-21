@extends('layouts.app')

@section('conteudo')

	@foreach($produtos as $produto)
	
		<div class="col-md-3 mb-3 ">
			<div class="col-md-12 card {{ (!$loop->first ? 'ml-2': '') }}">
			  <img src="{{($produto->caminho_imagem ? asset ($produto->caminho_imagem) : 'https://upload.wikimedia.org/wikipedia/commons/1/1b/Square_200x200.png' )}}" class="card-img-top img-fluid" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">{{ $produto->nome }}</h5>
			    <p class="card-text">{{ $produto->valor}}</p>
			    <a href="{{ route('adiciona_carrinho', ['produto'=>$produto->id]) }}" class="btn btn-primary w-100">Adicionar ao carrinho</a>
			  </div>
			</div>
		</div>
	
	@endforeach

@endsection
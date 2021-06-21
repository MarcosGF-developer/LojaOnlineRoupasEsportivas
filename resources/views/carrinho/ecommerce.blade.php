@extends('layouts.app')

@section('conteudo')

	@foreach($produtos as $produto)
	<div class="row justify-content-center">
        <div class="col-md-10">
        	<div class="card text-white bg-dark mt-2">
		
			<div class="col-md-12 - mt-3 card card text-white bg-dark{{ (!$loop->first ? 'ml-10': '') }} h-100" style="width: 18rem; ">
			  <img src="{{($produto->caminho_imagem ? asset ($produto->caminho_imagem) : 'https://upload.wikimedia.org/wikipedia/commons/1/1b/Square_200x200.png' )}}" class="card-img-top img-fluid" alt="...">
			  <div class="card-body " >
			    <label>Nome <h5 class="card-title">{{ $produto->nome }}</h5></label> 
			    <label>Preço <p class="card-text">{{ $produto->valor}}</p></label>
			    <a href="{{ route('adiciona_carrinho', ['produto'=>$produto->id]) }}" class="btn btn-light w-100">Adicionar ao carrinho</a>
			  </div>
			</div>
			</div>
		</div>
	</div>
	
	@endforeach

@endsection
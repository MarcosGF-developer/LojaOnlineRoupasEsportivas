@extends('layouts.app')

@section('conteudos')
	
		
	@foreach($produtos as $produto)
	
        <div class="col-md-5-mb-5 mr-5 pb-5 ml-5">
		
			<div class="col-md-12-mt-1 card card text-white bg-dark {{ (!$loop->first ?: '') }} h-100" style="width: 18rem; ">
			  <img src="{{($produto->caminho_imagem ? asset ($produto->caminho_imagem) : 'https://upload.wikimedia.org/wikipedia/commons/1/1b/Square_200x200.png' )}}" class="card-img-top img-fluid" alt="...">
			  <div class="card-body " >
			    <label><b>Nome </b></label><h5 class="card-title">{{ $produto->nome }}</h5>
			    <label><b>Preço </b></label><p class="card-text">{{ $produto->valor_unitario}}</p>
			    <label><b>Sexo </b></label><p class="card-text">{{ $produto->categorias->categoria_pai}}</p>
			    <a href="{{ route('adiciona_carrinho', ['produto'=>$produto->id]) }}" class="btn btn-light w-100">Adicionar ao carrinho</a>
			  </div>
			</div>
		</div>
	
	@endforeach

	


@endsection
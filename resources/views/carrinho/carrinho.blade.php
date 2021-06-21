@extends ('layouts.app')

@section('conteudo')

@if(isset($produto))
<h1>Carrinho</h1>
<div class="form-group">
	<form action="{{ route('finaliza_compra_carrinho') }}" method="post">
	@csrf
	<input type="hidden" value="{{ $produto->id }}" name="id">
	<div class="row">
		<div class="col-md-5">
			{{ $produto->nome }}
		</div>
		<div class="col-md-5">
			<select name="quantidade" class="form-select">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
		<div class="col-md-2">
			<input type="submit" value="Adicionar" class="btn btn-primary">
		</div>
	</div>
	</form>
</div>
@endif
@if (isset($carrinho))
<h2> Você já tem no carrinho:</h2>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table">
			<thead>
				<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Quantidade</th>
				<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
			@php
				$total = 0;
			@endphp
			@foreach ($carrinho as $k => $c)
				<tr>

					<td>{{$k}}</td>
					<td>{{ $c['produto']->nome}}</td>
					<td>{{ $c['quantidade']}}</td>
					@php
						$total += $c['quantidade'] * $c['produto']->valor_unitario;
					@endphp
					<td>{{ $c['quantidade'] * $c['produto']->valor_unitario}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		Total: R$ {{ $total }}

		<a href="{{ route('fecha_carrinho') }}" class="btn btn-success"><i class="bi-cart"></i> Fechar compra</a>
	</div>
	<div class="col-md-2"></div>
</div>
@endif
@endsection
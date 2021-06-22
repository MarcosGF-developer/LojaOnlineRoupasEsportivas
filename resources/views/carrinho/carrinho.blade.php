@extends ('layouts.app')

@section('conteudo')

@if(isset($produto))
<div class="row justify-content-center">
	<div class="col-md-10">

		    <div class="card text-white bg-dark">
				<div class="card-header ">
			                    <h2><b>Carrinho</b></h2>
				</div>
			<div class="form-group row justify-content-center">
			<form action="{{ route('finaliza_compra_carrinho') }}" method="post">
			@csrf
			<table class="table table-dark table-striped">
			<thead>
				<th>Nome</th>
				<th>Quantidade</th>
				<th>Valor Unitário</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					<input type="hidden" value="{{ $produto->id }}" name="id">
					<div class="row">
						<div class="col-md-10">
							<b><h3>{{ $produto->nome }}</h3></b>
						</div>
					</td>
					<td>
						<div class="col-md-10">
							<select name="quantidade" class="form-select">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</td>
					<td>
					<input type="hidden" value="{{ $produto->id }}" name="id">
					<div class="row">
						<div class="col-md-10">
							<b><h3>{{ $produto->valor }}</h3></b>
						</div>
					</td>
				</tr>
			</tbody>
			</table>
				<div class="col-md-2">
					<input href="{{ route('carrinho') }}" type="submit" value="Adicionar" class="btn btn-light">
				</div>
			</div>
			</form>
			</div>
			</div>
	</div>
</div>
@endif
@if (isset($carrinho))
<div class="row justify-content-center">
<div class="col-md-10">

<div class="card text-white bg-dark">
<div class="card-header">
        <h2><b>Você já tem Carrinho:</b></h2>
</div>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table table-dark table-striped">
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
						$total += $c['quantidade'] * $c['produto']->valor
					@endphp
					<td>{{ $c['quantidade'] * $c['produto']->valor}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		Total: R$ {{ $total }}

		<a href="{{ route('fecha_carrinho') }}" class="btn btn-light"><i class="bi-cart"></i> Fechar compra</a>
	</div>
	<div class="col-md-2-mb-5"></div>
</div>
</div>
</div>
</div>
@endif
@endsection
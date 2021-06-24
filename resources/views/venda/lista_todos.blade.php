@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card text-white bg-dark">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2>Lista de <b> Compras </b></h2>
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
                            <a href="{{ route('lista_ecommerce') }}" class="btn btn-light">E-commerce</a>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="card-body">
                
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr class="table-ligth">
                                <th class="text-center">ID</th>
                                <th class="text-center">Valor Total</th>
                                <th class="text-center">Quantidade de Itens</th>
                                <th class="text-center">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendas as $v)
                                <tr>
                                    <td class="text-center">{{ $v->id }}</td>
                                    
                                    <td class="text-center">{{ $v->valor_total }}</td>
                                    <td class="text-center">{{ $v->quantidade_itens }}</td>
                                    <td class="text-center">{{ date("d/m/Y", strtotime("$v->created_at")) }}</td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $vendas->links() }}

                </div>

            </div>

        </div>
    </div>
</div>



@endsection
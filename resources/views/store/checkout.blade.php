@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop


@section('content')

    <div class="container">

        @if($cart == 'empty')
            <h3>Carrinho de compras vazio</h3>
        @else
            <h3>Pedido realizado com sucesso !</h3>
            <p>O Pedido #{{$order->id}}, foi realizado com sucesso.</p>
        @endif
    </div>
@stop
@extends('app')

@section('content')
    <div class="container">
        <h1>Ordens</h1>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Comprador</th>
                <th>Valor Total</th>
                <th>Data da Ordem</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>

            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>R$ {{ number_format($order->total, 2,',','.') }}</td>
                    <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                    <td>
                        @if($order->status == 0)
                            Aguardando pagamento
                        @elseif($order->status == 1)
                            Pagamento confirmado
                        @elseif($order->status == 2)
                            Enviado
                        @else
                            Cancelado
                        @endif
                    </td>
                    <td><a href="{{ route('order_edit', ['id' => $order->id]) }}" title="delete" class="btn btn-danger">Alterar Status</a></td>
                </tr>
            @endforeach
        </table>
        {!! $orders->render() !!}


    </div>
@endsection
@extends('store.account.index')

@section('data_user')

    <div class="col-sm-9">
        <div class="left-sidebar">
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                <h3>Meus Pedidos</h3>

                <table class="table">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Itens</th>
                        <th>Valor</th>
                        <th>Status</th>
                    </tr>

                    @foreach($orders as $order)

                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                <ul>
                                    @foreach($order->items as $item)

                                        <li>{{ $item->product->name }}</li>

                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $order->total }}</td>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--/category-products-->
        </div>
    </div>
@stop
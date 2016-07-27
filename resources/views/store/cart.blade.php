@extends('store.store')


@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Description</td>
                            <td class="price">Price</td>
                            <td class="price">Qtd</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->all() as $k=>$item)
                            <tr>
                                <td class="cart_product">
                                    <a href="#">
                                        Imagem
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="#">{{$item['name']}}</a> </h4>
                                    <p>Código: {{ $k }}</p>
                                </td>
                                <td class="cart_price">
                                    <h4><a href="#">{{$item['price']}}</a> </h4>
                                </td>
                                <td class="cart_quantity">
                                    <h4><a href="#">{{$item['qtd']}}</a> </h4>
                                </td>
                                <td class="cart_total">
                                    <p href="cart_total_price">R$ {{$item['price'] * $item['qtd']}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a href="#" class="cart_quantity_delete">
                                        Dekete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop
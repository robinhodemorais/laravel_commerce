Caro Sr(a) {{ $user->name }}
<br>
<br>

Recebemos seu pedido nº: {{ $order->id }}.
<br>
<br>
O pedido será processado após recebermos da operadora a confirmação de pagamento com o cartão de crédito informado.
<br>
<br>
Dados do pedido {{ $order->id }}:
<br>
Nº: {{ $order->id }}
<br>
<ul>
    @foreach($order->items as $item)
        <li>Nome do Produto: {{ $item->product->name }}</li>
    @endforeach

    <h3><li>Valor: R$ {{ $order->total }}</li></h3>
</ul>
<br>
<br>
Obrigado pela preferencia!
<br>
Atenciosamente:
<br>
Code Commerce
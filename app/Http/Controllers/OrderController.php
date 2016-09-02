<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class OrderController extends Controller
{
    private $order;
    function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function index()
    {
        $orders = $this->order->paginate(10);
        return view('order.index', compact('orders'));
    }
    public function edit($id)
    {
        $order = $this->order->find($id);
        return view('order.edit', compact('order'));
    }
    public function update(Requests\OrderRequest $orderRequest, $id)
    {
        $this->order->find($id)->update($orderRequest->all());
        return redirect()->route('orders');
    }
}

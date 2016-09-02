<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Address;
use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    private $user;
    private $order;
    function __construct(Order $order, User $user)
    {
        $this->order = $order;
        $this->user = $user;
    }

    public function index()
    {
        $orders = Auth::user()->orders;
        $users = $this->user->all();
        return view('store.account.home', compact('orders', 'users'));
    }

    //pedidos
    public function orders()
    {
        //pega as ordens do usuário
        $orders = Auth::user()->orders;

        return view ('store.account.orders', compact('orders'));
    }

    public function address()
    {
        $address = Auth::user()->address;
        //dd($address);
        return view('store.account.address', compact('address'));
    }
    public function addressnew()
    {
        $address = Auth::user()->address;
        return view('store.account.addressnew', compact('address'));
    }
    public function registerAddress(Requests\AddressRequest $addressRequest)
    {
        $data = $addressRequest->all();
        Address::create($data);
        return redirect()->route('account_address');
    }
    public function edit($id)
    {
        $address = Address::find($id);
        return view('store.account.addressedit', compact('address'));
    }
    public function update(Requests\AddressRequest $addressRequest, $id)
    {
        Address::find($id)->update($addressRequest->all());
        return redirect()->route('account_address');
    }
    public function destroy($id)
    {
        Address::findOrNew($id)->delete();
        return redirect()->route('account_address');
    }
    public function perfil($id)
    {
        $user = Auth::user()->find($id);
        return view('store.account.perfil', compact('user'));
    }
    public function perfilUpdate(Requests\PerfilRequest $perfilRequest, $id)
    {
        $input = $perfilRequest->all();
        if ($input['password'] == null) {
            Auth::user()->find($id)->update($input['name'],$input['email']);
        }else{
            $input['password'] = Hash::make($input['password']);
            Auth::user()->find($id)->update($input);
        }
        return redirect()->route('account')->with('account_perfil_success', 'Dados do perfil atualizado!');
    }
}

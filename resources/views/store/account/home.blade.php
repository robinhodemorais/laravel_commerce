@extends('store.account.index')

@section('data')

    <div class="container">
        @if (session('account_perfil_success'))
            <div class="alert alert-success">
                {{ session('account_perfil_success') }}
            </div>
        @endif
        <div class="jumbotron">
            <h3>Olá, {{ Auth::user()->name }}, Seja bem vindo à sua conta!</h3>
            <p>Aproveite nossa promoções</p>
        </div>
    </div>
@stop
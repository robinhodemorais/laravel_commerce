@extends('store.store')

@section('data_user')
    @include('store.partial.sidebar_data_user')
@stop

@section('content')
    <div class="padding-right">

        <div class="features_items"><!--features_items-->
            <div class="container">

                @yield('data')

            </div>
        </div>
        <!--features_items-->
    </div>
@stop
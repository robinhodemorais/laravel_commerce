<div class="col-sm-3">
    <div class="left-sidebar">
        <h3>
            <a href="{{ route('account') }}">
                Minha Conta
            </a>
        </h3>

        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{ route('account_perfil', ['id' => \Illuminate\Support\Facades\Auth::user()->id]) }}">Perfil</a></h4>
                    <br>
                    <h4 class="panel-title"><a href="{{ route('account_orders') }}">Meus Pedidos</a></h4>
                    <br>
                    <h4 class="panel-title"><a href="{{ route('account_address') }}">Endereço</a></h4>
                </div>
            </div>

        </div>
        <!--/category-products-->
    </div>
</div>
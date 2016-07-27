@extends('store.store')

@section('categories')
   @include('store.categories_partial')
@stop

@section('content')
        <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                                <div class="view-product">
                                </div>
                                <div id="similar-product" class="carousel slide" data-ride="carousel">

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                                <div class="item active">
                                                </div>
                                        </div>
                                </div>

                        </div>
                        <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                        <h2>{{ $products->name }}</h2>
                                        <p>{{ $products->description }}</p>
                                        <span>
                        <span>R$ {{ number_format($products->price,2,",",".") }}</span>
                            <a href="#" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Adicionar no Carrinho
                            </a>
                    </span>
                                </div>
                                <hr>
                                <div class="col-sm-7">
                                        Tags:
                                        @foreach($products->tags as $tag)
                                                <span class="label label-primary">
                                                        <a style="color:#FFF" href="#" class="">{{ $tag->name }}</a>
                                                </span>
                                        @endforeach
                                </div>
                                <!--/product-information-->
                        </div>
                </div>
                <!--/product-details-->
        </div>
@stop
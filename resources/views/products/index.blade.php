@extends('app')

@section('content')

    <div class="container">
        <h1>Products</h1>
        <br>
        <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>featured</th>
                <th>recommend</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <th>{{$product->name}}</th>
                    <th>{{$product->description}}</th>
                    <th>{{$product->price}}</th>
                    <th>{{$product->featured}}</th>
                    <th>{{$product->recommend}}</th>
                    <th>
                        <a href="{{ route('products.edit',['id'=>$product->id]) }}">Edit</a>
                        |
                        <a href="{{ route('products.destroy',['id'=>$product->id]) }}">Delete</a>
                    </th>
                </tr>
            @endforeach
        </table>
    </div>


@endsection

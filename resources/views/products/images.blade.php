@extends('app')

@section('content')

    <div class="container">
        <h1>Images of {{$product->name}}</h1>
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
                <th>Category</th>
            <!-- <th>featured</th>
                <th>recommend</th> -->
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <th>{{$product->name}}</th>
                    <th>{{str_limit($product->description, $limit = 100, $end = '...')}}</th>
                    <th>{{$product->price}}</th>
                    <th>{{$product->category->name}}</th>
                <!-- <td>{{ $product->featured == 1 ? 'Yes' : 'No' }}</td>
                    <td>{{ $product->recommend == 1 ? 'Yes' : 'No' }}</td> -->
                    <th>
                        <a href="{{ route('products.edit',['id'=>$product->id]) }}">Edit</a>
                        |
                        <a href="{{ route('products.destroy',['id'=>$product->id]) }}">Delete</a>
                    </th>
                </tr>
            @endforeach
        </table>

        <!-- Cria a paginação
        Quando utiliza o !! é para não dar o scape
        -->
        {!! $products->render() !!}

    </div>


@endsection

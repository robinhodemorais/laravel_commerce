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
                <th>Featured</th>
                <th>Recommend</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ str_limit($product->name, $limit = 30, $end = '...') }}</td>
                    <td>{{ str_limit($product->description, $limit = 40, $end = '...') }}</td>
                    <td>{{ number_format($product->price, 2,',','.') }}</td>
                    <td>{{ $product->featured == 1 ? 'SIM' : 'NÃO' }}</td>
                    <td>{{ $product->recommend == 1 ? 'SIM' : 'NÃO' }}</td>
                    <td>{{ $product->category->name }}</td>
                    <th>
                        <a href="{{ route('products.edit',['id'=>$product->id]) }}"
                           class="btn btn-default glyphicon glyphicon-pencil"></a> |
                        <a href="{{ route('products.images',['id'=>$product->id]) }}"
                           class="btn btn-default glyphicon glyphicon-picture"></a> |
                        <a href="{{ route('products.destroy',['id'=>$product->id]) }}"
                           class="btn btn-default glyphicon glyphicon-remove"></a>
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

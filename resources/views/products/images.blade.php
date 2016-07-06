@extends('app')

@section('content')

    <div class="container">
        <h1>Images of {{$product->name}}</h1>
        <br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            @foreach($product->images as $image)
                <tr>
                    <th>{{$image->id}}</th>
                    <th>
                        <img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}" width="80">
                    </th>
                    <th>{{$image->extension}}</th>
                    <th>
                    </th>
                </tr>
            @endforeach
        </table>

        <a href="{{route('products')}}" class="btn btn-default">Voltar</a>


    </div>


@endsection

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
                    <th>{{$image->extension}}</th>
                    <th>
                    </th>
                </tr>
            @endforeach
        </table>


    </div>


@endsection

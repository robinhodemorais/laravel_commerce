@extends('app')

@section('content')

    <div class="container">
        <h1>Categories</h1>
        <br>
        <a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <th>{{$category->name}}</th>
                    <th>{{$category->description}}</th>
                    <th>
                        <a href="{{ route('categories.edit',['id'=>$category->id]) }}"
                           class="btn btn-default glyphicon glyphicon-pencil"></a> |
                        <a href="{{ route('categories.destroy',['id'=>$category->id]) }}"
                           class="btn btn-default glyphicon glyphicon-remove"></a>
                    </th>
                </tr>
            @endforeach
        </table>

        <!-- Cria a paginação
       Quando utiliza o !! é para não dar o scape
       -->
        {!! $categories->render() !!}

    </div>


@endsection

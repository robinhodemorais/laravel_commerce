@extends('app')

@section('content')

    <div class="container">
        <h1>Edit Category: {{$category->name}}</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <!-- url que é enviado os dados
          Só de colocar a url, já ativa o submit do botão
          passa a rota que queremos alterar
        -->
        {!! Form::open(['route'=>['categories.update', $category->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!!Form::submit('Save Category', ['class'=>'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}


    </div>


@endsection

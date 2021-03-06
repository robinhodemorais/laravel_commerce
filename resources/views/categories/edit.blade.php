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
        <!--
        Passando o model ... :model($category ..
         automaticamente o laravel inclui os dados nos campos quando edita
         porém os campos tem que estar com os nomes igual da tabela
        -->
        {!! Form::model($category,['route'=>['categories.update', $category->id], 'method'=>'put']) !!}

            @include('categories._form')

            {{--<div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
            </div>
--}}
            <div class="form-group">
                {!!Form::submit('Save Category', ['class'=>'btn btn-primary']) !!}
                <a href="{{route('categories')}}" class="btn btn-danger glyphicon glyphicon-arrow-left">Voltar</a>
            </div>

        {!! Form::close() !!}


    </div>


@endsection

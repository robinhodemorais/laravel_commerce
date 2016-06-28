@extends('app')

@section('content')

    <div class="container">
        <h1>Create Category</h1>

        <!-- url que é enviado os dados
          Só de colocar a url, já ativa o submit do botão
        -->
        {!! Form::open(['url'=>'categories']) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textArea('description', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!!Form::submit('Add Category', ['class'=>'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}


    </div>


@endsection

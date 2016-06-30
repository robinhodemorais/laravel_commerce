@extends('app')

@section('content')

    <div class="container">
        <h1>Create Product</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::open(['route'=>'products.store']) !!}

        <!-- name -->
        <div class="form-group">
            {!! Form::label('name','Name :') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <!-- Description -->
        <div class="form-group">
            {!! Form::label('description','Description : ') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>

        <!-- price -->
        <div class="form-group">
            {!! Form::label('price','Price : ') !!}
            {!! Form::text('price', null, ['class'=>'form-control']) !!}
        </div>

        <!-- featured -->
        <div class="form-group">
            {!! Form::label('featured','Featured : ') !!}
            {!! Form::checkbox('featured', false) !!}
        </div>

        <!-- recommend -->
        <div class="form-group">
            {!! Form::label('recommend','Recommend : ') !!}
            {!! Form::checkbox('recommend', false) !!}
        </div>

        <div class="form-group">
            {!!Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}


    </div>


@endsection

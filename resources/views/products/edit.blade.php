@extends('app')

@section('content')

    <div class="container">
        <h1>Edit Product: {{$product->name}}</h1>

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
        {!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}

    <!-- category
            category_id é o campo de relacionamento da tabela Products
            $categories traz a listagem de categorias
            -->
        <div class="form-group">
            {!! Form::label('category','Category : ') !!}
            {!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
        </div>


        <!-- name -->
        <div class="form-group">
            {!! Form::label('name','Name :') !!}
            {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
        </div>

        <!-- Description -->
        <div class="form-group">
            {!! Form::label('description','Description : ') !!}
            {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
        </div>

        <!-- price -->
        <div class="form-group">
            {!! Form::label('price','Price : ') !!}
            {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
        </div>

        <!-- featured -->
        <div class="form-group">
            {!! Form::label('featured','Featured : ') !!}
            {!! Form::select('featured', [$product->featured => 'NÃO', 1 => 'SIM'], null, ['class' => 'form-control']) !!}
        </div>

        <!-- recommend -->
        <div class="form-group">
            {!! Form::label('recommend','Recommend : ') !!}
            {!! Form::select('recommend', [$product->recommend => 'NÃO', 1 => 'SIM'], null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', 'TAGs:') !!}
            {!! Form::textarea('tags', $product->tagList, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!!Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>


@endsection

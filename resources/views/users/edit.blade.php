@extends('app')

@section('content')
    <div class="container">
        <h1>Edit User: {{ $user->name }}</h1>

        @if($errors->any())

            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>['users.update', $user->id], 'method'=>'put']) !!}

        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', $user->email, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', $user->password, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_admin', 'Permission:') !!}
            {!! Form::select('is_admin', ['1' => 'Administrador', '0' => 'Usuário'], $user->id, ['class'=>'form-control']) !!}
            {!! Form::select('is_admin', [$user->is_admin => 'Usuário', 1 => 'SIM'], null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::submit('Save User', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection
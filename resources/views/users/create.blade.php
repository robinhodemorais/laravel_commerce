@extends('app')

@section('content')
    <div class="container">
        <h1>Create User</h1>

        @if($errors->any())

            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['url'=>'admin\users']) !!}

        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_admin', 'Permission:') !!}
            {!! Form::select('is_admin', ['Usuário', 'Administrador']) !!}
        </div>

        <div class="form-group">

            {!! Form::submit('Add User', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection
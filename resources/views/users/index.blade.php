@extends('app')

@section('content')
    <div class="container">
        <h1>Users</h1>

        <a href="{{ route('users.create') }}" class="btn btn-success">New User</a>
        <br />  <br />
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Permissão</th>
                <th>Action</th>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin == 0 ? 'Usuário' : 'Administrador' }}</td>
                    <td>
                        <a href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a> |
                        <a href="{{ route('users.destroy', ['id' => $user->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $users->render() !!}

    </div>
@endsection
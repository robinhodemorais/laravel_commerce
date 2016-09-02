@extends('app')

@section('content')
    <div class="container">
        <h1>Edição de Status de Ordem</h1>

        @if($errors->any())

            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li style="margin-left: 20px">{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>['order_update', $order->id], 'method'=>'put']) !!}

        <div class="form-group">

            {!! Form::label('status', 'Status:') !!}
            {!! Form::select(
                'status', [
                    '0' => 'Aguardando pagamento',
                    '1' => 'Pagamento confirmado',
                    '2' => 'Enviado',
                    '3' => 'Cancelado'
                    ])
            !!}

        </div>

        <div class="form-group">
            {!! Form::submit('Atualizar', ['class'=>'btn btn-success']) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection
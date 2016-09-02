@extends('store.store')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Endereço</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['route' => ['account_address_update', $address->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Referência</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="reference" placeholder="Referência" value="{{ $address->reference }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">CEP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="zip_code" placeholder="CEP (Apenas números)" value="{{ $address->zip_code }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Rua</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="street" placeholder="Rua" value="{{ $address->street }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nº</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="number" placeholder="Número" value="{{ $address->number }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Complemento</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="complement" placeholder="Casa, Apto., Bloco" value="{{ $address->complement }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Bairro</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="district" placeholder="Bairro" value="{{ $address->district }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cidade</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" placeholder="Cidade" value="{{ $address->city }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Pais</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" placeholder="País" value="{{ $address->country }}">
                            </div>
                        </div>

                        <input type="hidden" name="status" value="1">

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar Endereço
                                </button>
                            </div>
                        </div>
                        {!! Form::token() !!}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
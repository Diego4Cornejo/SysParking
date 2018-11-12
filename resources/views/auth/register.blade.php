@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Registro de Usuarios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('Formulario de registro de usuario') }}</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre: ') }}</label>
                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="US_APELLIDO" class="col-md-4 col-form-label text-md-right">Apellidos :</label>
                        <div class="col-md-6">
                            <input name="US_APELLIDO" id="US_APELLIDO" type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-group row">
                                <label for="US_RUT" class="col-md-4 col-form-label text-md-right">RUT :</label>
                                <div class="col-md-6">
                                    <input name="US_RUT" id="US_RUT" type="text" class="form-control">
                                </div>
                        </div>

                        <div class="form-group row">
                                        <label for="US_TELEFONO" class="col-md-4 col-form-label text-md-right">Numero de Telefono :</label>
                                        <div class="col-md-6">
                                            <input name="US_TELEFONO" id="US_TELEFONO" type="text" class="form-control">
                                        </div>
                        </div>
                        <div class="form-group row">
                                <label for="ID_CARGO" class="col-md-4 col-form-label text-md-right">Tipo de Plan :</label>
                                <div class="col-md-6">
                                <select name="ID_CARGO" id="ID_CARGO" type="text" class="form-control">
                                    <option>Seleccionar...</option>
                                    @forelse ($cargos as $cargo)
                                        <option value="{{$cargo -> ID_CARGO}}"name="ID_CARGO">{{ $cargo -> CAR_NOMBRE }} </option>
                                    @empty
    
                                    @endforelse
                                </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail :') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-">
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-5">
                <div class="card-header">
                    Registrati
                </div>
                <div class="card-body px-5">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }} row">
                            <label for="nome" class="col-md-4 col-form-label">Nome</label>

                            <div class="col-md-8">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus> @if ($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cognome') ? ' has-error' : '' }} row">
                            <label for="cognome" class="col-md-4 col-form-label">Cognome</label>

                            <div class="col-md-8">
                                <input id="cognome" type="text" class="form-control" name="cognome" value="{{ old('cognome') }}" required autofocus> @if ($errors->has('cognome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cognome') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label">E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} row">
                            <label for="telefono" class="col-md-4 col-form-label">Telefono</label>

                            <div class="col-md-8">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autofocus> @if ($errors->has('telefono'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ruolo') ? ' has-error' : '' }} row">
                            <label for="ruolo" class="col-md-4 col-form-label">Ruolo</label>

                            <div class="col-md-8">
                                <select id="ruolo" class="form-control" name="ruolo" value="{{ old('ruolo') }}" required autofocus>
                                    <option value="1">Pastore</option>
                                    <option value="2">Anziano</option>
                                    <option value="3">Responsablile</option>
                                    <option value="4">Altro</option>
                                </select>
                                @if ($errors->has('ruolo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ruolo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                            <label for="password" class="col-md-4 col-form-label">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label">Confirm Password</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-md-6">
                            
                                <button type="submit" class="btn btn-primary float-right">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
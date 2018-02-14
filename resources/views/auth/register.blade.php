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

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label">Nome</label>

                            <div class="col-md-8">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus> 
                                @if ($errors->has('nome'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('nome') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cognome" class="col-md-4 col-form-label">Cognome</label>

                            <div class="col-md-8">
                                <input id="cognome" type="text" class="form-control{{ $errors->has('cognome') ? ' is-invalid' : '' }}" name="cognome" value="{{ old('cognome') }}" required autofocus> 
                                @if ($errors->has('cognome'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('cognome') }}
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required> 
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label">Telefono</label>

                            <div class="col-md-8">
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus> 
                                @if ($errors->has('telefono'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('telefono') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ruolo" class="col-md-4 col-form-label">Ruolo</label>

                            <div class="col-md-8">
                                <select id="ruolo" class="form-control{{ $errors->has('ruolo') ? ' is-invalid' : '' }}" name="ruolo" value="{{ old('ruolo') }}" required autofocus>
                                    <option value="1">Pastore</option>
                                    <option value="2">Anziano</option>
                                    <option value="3">Responsablile</option>
                                    <option value="4">Altro</option>
                                </select>
                                @if ($errors->has('ruolo'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('ruolo') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> 
                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label">Conferma Password</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-md-6">
                            
                                <button type="submit" class="btn btn-primary float-right">
                                    Registrati
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
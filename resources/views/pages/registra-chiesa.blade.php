@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-5">
                <div class="card-header">
                    Registra la propria chiesa
                </div>
                <div class="card-body px-5">
                    <form class="form-horizontal" method="POST" action="{{ route('registraChiesa') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome" class="control-label">Nome Chiesa:</label>

                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus> 
                                @if ($errors->has('nome'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('nome') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="control-label">Email</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="indirizzo" class=" control-label">Indirizzo</label>

                                <input id="indirizzo" type="text" class="form-control" name="indirizzo" value="{{ old('indirizzo') }}" required> @if ($errors->has('indirizzo'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('indirizzo') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="regione" class="control-label">Regione</label>

                                <select id="regione" class="form-control" name="regione" value="{{ old('regione') }}" required autofocus>
                                    <option disabled selected value> Scegli regione </option>
                                    @foreach ($regioni as $regione)
                                    <option value="{{$regione->id}}">{{$regione->nome}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('regione'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('regione') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <label for="provincia" class="control-label">Provincia</label>

                                <select id="provincia" class="form-control" name="provincia" value="{{ old('provincia') }}" disabled>
                                </select>

                                @if ($errors->has('provincia'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('provincia') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3">
                                <label for="comune" class="control-label">Comune</label>

                                <select id="comune" class="form-control" name="comune" value="{{ old('comune') }}" disabled>
                                </select>

                                @if ($errors->has('comune'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('comune') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telefono" class="control-label">Telefono</label>

                                <input id="telefono" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus> @if ($errors->has('telefono'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sito" class="control-label">Sito</label>

                                <input id="sito" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="sito" value="{{ old('sito') }}" required autofocus> @if ($errors->has('sito'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('sito') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="congregazione" class="control-label">Congregazione</label>
                                <select id="congregazione" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="congregazione" value="{{ old('congregazione') }}" >
                                    <option value="">Nessuna</option>
                                    @foreach ($congregazioni as $congregazione)
                                    <option value="{{$congregazione->id}}">{{$congregazione->nome}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('congregazione'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('congregazione') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="bd-example">
                                <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Scegli immagine copertina della chiesa</label>
                                </div>
                            </div>
                        </div>





                        <div class="form-group row justify-content-end">
                            <div class="col-md-6">

                                <button type="submit" class="btn btn-primary float-right">
                                    Registra
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
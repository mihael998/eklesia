<div class="">
    <form class="form-horizontal" method="POST" action="{{ route('modificaChiesa') }}" name="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome" class="control-label">Nome Chiesa:</label>

                    <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $chiesa->nome }}" required autofocus> 
                    @if ($errors->has('nome'))
                    <span class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="email" class="control-label">Email</label>

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $chiesa->email }}" required autofocus> @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>
            </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="indirizzo" class=" control-label">Indirizzo</label>
                <input id="indirizzo" type="text" class="form-control{{ $errors->has('indirizzo') ? ' is-invalid' : '' }}" name="indirizzo" value="{{ $chiesa->indirizzo }}" required> @if ($errors->has('indirizzo'))
                <span class="invalid-feedback">
                    {{ $errors->first('indirizzo') }}
                </span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="regione" class="control-label">Regione</label>

                <select id="regione" class="form-control{{ $errors->has('regione') ? ' is-invalid' : '' }}" name="regione" value="{{ old('regione') }}" required autofocus>
                    <option disabled value> Scegli regione </option>
                    @foreach ($regioni as $regione)
                    @if ($regione->id==$chiesa->comune->id_regione)
                        <option value="{{$regione->id}}" selected>{{$regione->nome}}</option> 
                    @else
                        <option value="{{$regione->id}}">{{$regione->nome}}</option>
                    @endif
                    
                    
                    @endforeach
                </select>

                @if ($errors->has('regione'))
                <span class="invalid-feedback">
                    {{ $errors->first('regione') }}
                </span>
                @endif
            </div>
            <div class="form-group col-md-2">
                <label for="provincia" class="control-label">Provincia</label>

                <select id="provincia" class="form-control{{ $errors->has('provincia') ? ' is-invalid' : '' }}" name="provincia" value="{{ old('provincia') }}">
                    @foreach ($chiesa->comune->regione->province as $provincia)
                        @if ($provincia->id==$chiesa->comune->id_provincia)
                            <option value="{{$provincia->id}}" selected>{{$provincia->nome}}</option>
                        @else
                            <option value="{{$provincia->id}}">{{$provincia->nome}}</option>
                        @endif
                    @endforeach
                        
                </select>

                @if ($errors->has('provincia'))
                <span class="invalid-feedback">
                    {{ $errors->first('provincia') }}
                </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <label for="comune" class="control-label">Comune</label>

                <select id="comune" class="form-control{{ $errors->has('comune') ? ' is-invalid' : '' }}" name="comune" >
                    @foreach ($chiesa->comune->provincia->comuni as $comune)
                        @if ($comune->id==$chiesa->id_comune)
                            <option value="{{$comune->id}}" selected>{{$comune->nome}}</option>
                        @else
                            <option value="{{$comune->id}}">{{$comune->nome}}</option>
                        @endif
                    @endforeach
                    <option value="{{$chiesa->id_comune}}">{{$chiesa->comune->nome}}</option>
                </select>

                @if ($errors->has('comune'))
                <span class="invalid-feedback">
                    {{ $errors->first('comune') }}
                </span>
                @endif
            </div>

        </div>

        <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="telefono" class="control-label">Telefono</label>

                        <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ $chiesa->telefono }}" required autofocus> 
                        @if ($errors->has('telefono'))
                        <span class="invalid-feedback">
                            {{ $errors->first('telefono') }}
                        </span>
                        @endif
                    </div>
            <div class="form-group{{ $errors->has('sito') ? ' has-error' : '' }} col-md-4">
                <label for="sito" class="control-label">Sito</label>

                <input id="sito" type="text" class="form-control{{ $errors->has('sito') ? ' is-invalid' : '' }}" name="sito" value="{{$chiesa->sito}}" required autofocus> @if ($errors->has('sito'))
                <span class="help-block">
                    {{ $errors->first('sito') }}
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('congregazione') ? ' has-error' : '' }} col-md-4">
                <label for="congregazione" class="control-label">Congregazione</label>
                <select id="congregazione" class="form-control{{ $errors->has('congregazione') ? ' is-invalid' : '' }}" name="congregazione" value="{{$chiesa->id_congregazione}}">
                    <option value="">Nessuna</option>
                    @foreach ($congregazioni as $congregazione)
                        @if ($congregazione->id==$chiesa->id_congregazione)
                            <option value="{{$congregazione->id}}" selected>{{$congregazione->nome}}</option>
                        @else
                            <option value="{{$congregazione->id}}">{{$congregazione->nome}}</option>
                        @endif
                    
                    @endforeach
                </select>
                @if ($errors->has('congregazione'))
                <span class="help-block">
                    {{ $errors->first('congregazione') }}
                </span>
                @endif
            </div>
        </div>
        <div class="form-group">
                <div class="bd-example">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">
                        @if ($errors->has('foto'))
                        <span class="invalid-feedback">
                            {{ $errors->first('foto') }}
                        </span>
                        @endif
                        <label class="custom-file-label" for="customFile">Scegli immagine copertina della chiesa</label>
                    </div>
                </div>
            </div>





        <div class="form-group row justify-content-end">
            <div class="col-md-6">

                <button type="submit" class="btn btn-primary float-right" >
                    Aggiorna
                </button>
            </div>
        </div>
    </form>
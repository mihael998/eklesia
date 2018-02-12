<div class="">
    <form class="form-horizontal" method="POST" action="{{ route('modificaChiesa') }}" name="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-row">
            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }} col-md-6">
                <label for="nome" class="control-label">Nome Chiesa:</label>

                <input id="nome" type="text" class="form-control" name="nome" value="{{$chiesa->nome}}" required autofocus> @if ($errors->has('nome'))
                <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                <label for="email" class="control-label">Email</label>

                <input id="email" type="email" class="form-control" name="email" value="{{$chiesa->email}}" required autofocus> @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-4">
                <label for="indirizzo" class=" control-label">Indirizzo</label>

                <input id="indirizzo" type="text" class="form-control" name="indirizzo" value="{{$chiesa->indirizzo}}" required> @if ($errors->has('indirizzo'))
                <span class="help-block">
                    <strong>{{ $errors->first('indirizzo') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('regione') ? ' has-error' : '' }} col-md-3">
                <label for="regione" class="control-label">Regione</label>

                <select id="regione" class="form-control" name="regione" value="{{ old('regione') }}" required autofocus>
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
                <span class="help-block">
                    <strong>{{ $errors->first('regione') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('provincia') ? ' has-error' : '' }} col-md-2">
                <label for="provincia" class="control-label">Provincia</label>

                <select id="provincia" class="form-control" name="provincia" value="{{ old('provincia') }}">
                    @foreach ($chiesa->comune->regione->province as $provincia)
                        @if ($provincia->id==$chiesa->comune->id_provincia)
                            <option value="{{$provincia->id}}" selected>{{$provincia->nome}}</option>
                        @else
                            <option value="{{$provincia->id}}">{{$provincia->nome}}</option>
                        @endif
                    @endforeach
                        
                </select>

                @if ($errors->has('provincia'))
                <span class="help-block">
                    <strong>{{ $errors->first('provincia') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('comune') ? ' has-error' : '' }} col-md-3">
                <label for="comune" class="control-label">Comune</label>

                <select id="comune" class="form-control" name="comune" >
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
                <span class="help-block">
                    <strong>{{ $errors->first('comune') }}</strong>
                </span>
                @endif
            </div>

        </div>

        <div class="form-row">
            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-4">
                <label for="telefono" class="control-label">Telefono</label>

                <input id="telefono" type="text" class="form-control" name="telefono" value="{{$chiesa->telefono}}" required autofocus> @if ($errors->has('telefono'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefono') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('sito') ? ' has-error' : '' }} col-md-4">
                <label for="sito" class="control-label">Sito</label>

                <input id="sito" type="text" class="form-control" name="sito" value="{{$chiesa->sito}}" required autofocus> @if ($errors->has('sito'))
                <span class="help-block">
                    <strong>{{ $errors->first('sito') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('congregazione') ? ' has-error' : '' }} col-md-4">
                <label for="congregazione" class="control-label">Congregazione</label>
                <select id="congregazione" class="form-control" name="congregazione" value="{{$chiesa->id_congregazione}}">
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
                    <strong>{{ $errors->first('congregazione') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Seleziona foto di copertina</label>
            <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
        </div>





        <div class="form-group row justify-content-end">
            <div class="col-md-6">

                <button type="submit" class="btn btn-primary float-right" >
                    Aggiorna
                </button>
            </div>
        </div>
    </form>
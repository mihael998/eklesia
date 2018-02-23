<form id="{{$formId}}" action="{{route('aggiungiEvento')}}" method="post">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="titolo">Titolo</label>
            <input id="titolo" type="text" class="form-control{{ $errors->has('titolo') ? ' is-invalid' : '' }}" value="{{ old('titolo') }}" name="titolo" required>
            @if ($errors->has('titolo'))
                @component('partials.errors.invalid-input')
                    @slot('tipoRitorno')
                        feedback
                    @endslot
                    @slot('testoRitorno')
                        {{ $errors->first('titolo') }}
                    @endslot
                @endcomponent
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="privato">Visibilità</label>
            <select id="privato" type="text" class="form-control{{ $errors->has('privato') ? ' is-invalid' : '' }}" value="{{ old('privato') }}" name="privato" required>
                <option value="1">Privato</option>
                <option value="0">Pubblico</option>
            </select>
            @if ($errors->has('privato'))
                @component('partials.errors.invalid-input')
                    @slot('tipoRitorno')
                        feedback
                    @endslot
                    @slot('testoRitorno')
                        {{ $errors->first('privato') }}
                    @endslot
                @endcomponent
            @endif
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="descrizione">Descrizione (opzionale)</label>
            <textarea class="form-control{{ $errors->has('descrizione') ? ' is-invalid' : '' }}" id="descrizione" value="{{ old('descrizione') }}" name="descrizione" rows="3"></textarea>
            @if ($errors->has('descrizione'))
                @component('partials.errors.invalid-input')
                    @slot('tipoRitorno')
                        feedback
                    @endslot
                    @slot('testoRitorno')
                        {{ $errors->first('descrizione') }}
                    @endslot
                @endcomponent
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="data_inizio">Data inizio</label>
            <input id="data_inizio" type="date" class="form-control{{ $errors->has('data_inizio') ? ' is-invalid' : '' }}" value="{{ old('data_inizio') }}" name="data_inizio">
            @if ($errors->has('data_inizio'))
                @component('partials.errors.invalid-input')
                    @slot('tipoRitorno')
                        feedback
                    @endslot
                    @slot('testoRitorno')
                        {{ $errors->first('data_inizio') }}
                    @endslot
                @endcomponent
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="data_fine">Data fine</label>
            <input id="data_fine" type="date" class="form-control{{ $errors->has('data_fine') ? ' is-invalid' : '' }}" value="{{ old('data_fine') }}" name="data_fine">
            @if ($errors->has('data_fine'))
                @component('partials.errors.invalid-input')
                    @slot('tipoRitorno')
                        feedback
                    @endslot
                    @slot('testoRitorno')
                        {{ $errors->first('data_fine') }}
                    @endslot
                @endcomponent
            @endif
        </div>
    </div>
    <div class="form-group">

        <a class="link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Usa un luogo diverso rispetto a quello della chiesa
        </a>
    </div>
    <div class="collapse" id="collapseExample">
        <div class="form-row">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-4">
                <label for="indirizzo" class=" control-label">Indirizzo</label>

                <input id="indirizzo" type="text" class="form-control{{ $errors->has('indirizzo') ? ' is-invalid' : '' }}" value="{{ old('indirizzo') }}" name="indirizzo" value="{{ old('indirizzo') }}">

                @if ($errors->has('indirizzo'))
                    @component('partials.errors.invalid-input')
                        @slot('tipoRitorno')
                            feedback
                        @endslot
                        @slot('testoRitorno')
                            {{ $errors->first('indirizzo') }}
                        @endslot
                    @endcomponent
                @endif
            </div>
            <div class="form-group{{ $errors->has('regione') ? ' has-error' : '' }} col-md-3">
                <label for="regione" class="control-label">Regione</label>

                <select id="regione" class="form-control{{ $errors->has('regione') ? ' is-invalid' : '' }}" name="regione" value="{{ old('regione') }}" autofocus>
                    <option disabled selected value="null"> Scegli regione </option>
                    {{$regioni}}
                </select>
                @if ($errors->has('regione'))
                    @component('partials.errors.invalid-input')
                        @slot('tipoRitorno')
                            feedback
                        @endslot
                        @slot('testoRitorno')
                            {{ $errors->first('regione') }}
                        @endslot
                    @endcomponent
                @endif
            </div>
            <div class="form-group{{ $errors->has('provincia') ? ' has-error' : '' }} col-md-2">
                <label for="provincia" class="control-label">Provincia</label>

                <select id="provincia" class="form-control{{ $errors->has('provincia') ? ' is-invalid' : '' }}" name="provincia" value="{{ old('provincia') }}" disabled>

                </select>

                @if ($errors->has('provincia'))
                    @component('partials.errors.invalid-input')
                        @slot('tipoRitorno')
                            feedback
                        @endslot
                        @slot('testoRitorno')
                            {{ $errors->first('provincia') }}
                        @endslot
                    @endcomponent
                @endif
            </div>

            <div class="form-group col-md-3" >
                <label for="comune" class="control-label">Comune</label>

                <select id="comune" class="form-control{{ $errors->has('comune') ? ' is-invalid' : '' }}" name="comune" value="{{ old('comune') }}" disabled>
                </select>

                @if ($errors->has('comune'))
                    @component('partials.errors.invalid-input')
                        @slot('tipoRitorno')
                            feedback
                        @endslot
                        @slot('testoRitorno')
                            {{ $errors->first('comune') }}
                        @endslot
                    @endcomponent
                @endif
            </div>
        </div>
    </div>

</form>

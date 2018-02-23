<form id="{{$formId}}" action="{{route('aggiungiComunicazione')}}" method="post">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="titolo">Titolo</label>
            <input id="titolo" type="text" class="form-control{{ $errors->has('titolo') ? ' is-invalid' : '' }}" name="titolo" required value="{{ old('titolo') }}" placeholder="es: Raccolta alimentare, Culto anticipato ...">
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
        <div class="form-group col-md-3">
            <label for="prioritario">Broadcast
                <a class="link" data-toggle="tooltip" data-placement="top" title="Selezionando 'si' verrà inviata una notifica instantanea alle persone appartenenti alla chiesa">
                    <i class="fa fa-info-circle"></i>
                </a>
            </label>
                <select id="prioritario" type="text" class="form-control{{ $errors->has('prioritario') ? ' is-invalid' : '' }}" name="prioritario" required value="{{ old('prioritario') }}">
                    <option value="1">Sì</option>
                    <option value="0">No</option>
                </select>
                @if ($errors->has('prioritario'))
                    @component('partials.errors.invalid-input')
                        @slot('tipoRitorno')
                            feedback
                        @endslot
                        @slot('testoRitorno')
                            {{ $errors->first('prioritario') }}
                        @endslot
                    @endcomponent
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="privato">Visibilità
                    <a class="link" data-toggle="tooltip" data-placement="top" title="Selezionando 'privato' il contenuto sara visibile soltanto alle persone appartenenti alla chiesa">
                        <i class="fa fa-info-circle"></i>
                    </a>
                </label>
                <select id="privato" type="text" class="form-control{{ $errors->has('privato') ? ' is-invalid' : '' }}" name="privato" required value="{{ old('privato') }}">
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
                <label for="descrizione">Descrizione</label>
                <textarea class="form-control{{ $errors->has('descrizione') ? ' is-invalid' : '' }}" id="descrizione" name="descrizione" rows="3" value="{{ old('descrizione') }}"></textarea>
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
        <div class="form-group">
            <a class="link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                 Inserisci una data associata alla comunicazione

            </a>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="data">Data</label>
                <input id="data" type="date" class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" value="{{ old('data') }}">
                @if ($errors->has('data'))
                    @component('partials.errors.invalid-input')
                        @slot('tipoRitorno')
                            feedback
                        @endslot
                        @slot('testoRitorno')
                            {{ $errors->first('data') }}
                        @endslot
                    @endcomponent
                @endif
            </div>
            <div class="form-group col-md-2">
                <label for="orario">Orario</label>
                <input id="orario" type="time" class="form-control{{ $errors->has('orario') ? ' is-invalid' : '' }}" name="orario" value="{{ old('orario') }}">
                @if ($errors->has('orario'))
                    @component('partials.errors.invalid-input')
                        @slot('tipoRitorno')
                            feedback
                        @endslot
                        @slot('testoRitorno')
                            {{ $errors->first('orario') }}
                        @endslot
                    @endcomponent
                @endif
            </div>
        </div>
        </div>
    </form>

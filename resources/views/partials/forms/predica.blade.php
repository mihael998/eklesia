<form id="{{$formId}}" action="{{route('aggiungiPredica')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="titolo">Titolo:</label>
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
            <label for="privato">Visibilità:</label>
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
        <div class="form-group col-md-4">
            <label for="autore">Autore:</label>
            <input id="autore" type="text" class="form-control{{ $errors->has('autore') ? ' is-invalid' : '' }}" value="{{ old('autore') }}" name="autore" required>
            @if ($errors->has('autore'))
                @component('partials.errors.invalid-input')
                    @slot('tipoRitorno')
                        feedback
                    @endslot
                    @slot('testoRitorno')
                        {{ $errors->first('autore') }}
                    @endslot
                @endcomponent
            @endif
        </div>
        <div class="form-group col-md-3">
            <label for="data">Data:</label>
            <input id="data" type="date" class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" value="{{ old('data') }}" name="data">
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
        <div class="form-group col-md-5">
            <label for="tags">Tags:</label>
            <input id="tags" type="text" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" value="{{ old('tags') }}" name="tags">
            @if ($errors->has('tags'))
                @component('partials.errors.invalid-input')
                    @slot('tipoRitorno')
                        feedback
                    @endslot
                    @slot('testoRitorno')
                        {{ $errors->first('tags') }}
                    @endslot
                @endcomponent
            @endif
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="contenuto">Contenuto:</label>
            <textarea class="form-control{{ $errors->has('contenuto') ? ' is-invalid' : '' }}" id="contenuto" value="{{ old('contenuto') }}" name="contenuto" rows="3"></textarea>
            @if ($errors->has('contenuto'))
                @component('partials.errors.invalid-input')
                    @slot('tipoRitorno')
                        feedback
                    @endslot
                    @slot('testoRitorno')
                        {{ $errors->first('contenuto') }}
                    @endslot
                @endcomponent
            @endif
        </div>
    </div>
    <div class="form-row">
        <div class="custom-file">
            <input type="file" class="custom-file-input{{ $errors->has('audio') ? ' is-invalid' : '' }}" id="audio" value="{{ old('audio') }}" name="audio">
            <label class="custom-file-label" for="audio" type="file">Scegli file</label>
            @if ($errors->has('audio'))
            @component('partials.errors.invalid-input')
                @slot('tipoRitorno')
                    feedback
                @endslot
                @slot('testoRitorno')
                    {{ $errors->first('audio') }}
                @endslot
            @endcomponent
        @endif
        </div>
    </div>
</form>
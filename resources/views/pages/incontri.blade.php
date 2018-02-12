@extends('layouts.app') 
@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('js/modifica-chiesa.js') }}"></script>
    <script>
        @if (count($errors) > 0)
            $('#exampleModalCenter').modal('show');
        @endif
    </script>
@endsection
@section('content')
<div class="container">
    @include('partials.header-jumbotron')
    @component('partials.tab-menu')
        @component('partials.text.heading')
            @slot('titolo')
                @component('partials.text.titolo-heading')
                    @slot('sottotitolo')
                    chiesa
                    @endslot
                    Incontri Settimanali
                @endcomponent
            @endslot
            <a href="#" class="btn btn-link btn-lg p-0 float-right" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static">
                <i class="fa fa-plus align-text-center"></i>
            </a>
            @component('partials.crea-incontro-modal')
                @slot('titolo')
                    Aggiungi nuovo incontro
                @endslot
                @slot('formId')
                    formIncontro
                @endslot
                @slot('contenuto')
                <form id="formIncontro" action="{{route('aggiungiIncontro')}}" method="post" class="">
                        {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="titolo">Nome:</label>
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
                            <label for="giorno">Giorno:</label>
                            <select id="giorno" type="text" class="form-control{{ $errors->has('giorno') ? ' is-invalid' : '' }}" name="giorno" value="{{ old('fine') }}" required>
                                <option value="1">Lunedì</option>
                                <option value="2">Martedì</option>
                                <option value="3">Mercoledì</option>
                                <option value="4">Giovedì</option>
                                <option value="5">Venerdì</option>
                                <option value="6">Sabato</option>
                                <option value="7">Domenica</option>
                            </select>
                            @if ($errors->has('giorno'))
                                @component('partials.errors.invalid-input')
                                    @slot('tipoRitorno')
                                        feedback
                                    @endslot
                                    @slot('testoRitorno')
                                        {{ $errors->first('giorno') }}
                                    @endslot
                                @endcomponent
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inizio">Orario d'inzio:</label>
                            <input id="inizio" type="time" class="form-control{{ $errors->has('inizio') ? ' is-invalid' : '' }}" value="{{ old('fine') }}" name="inizio" required>
                            @if ($errors->has('inizio'))
                                @component('partials.errors.invalid-input')
                                    @slot('tipoRitorno')
                                        feedback
                                    @endslot
                                    @slot('testoRitorno')
                                        {{ $errors->first('inizio') }}
                                    @endslot
                                @endcomponent
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fine">Orario fine:</label>
                            <input id="fine" type="time" class="form-control{{ $errors->has('fine') ? ' is-invalid' : '' }}" value="{{ old('fine') }}" name="fine" required>
                            @if ($errors->has('fine'))
                                @component('partials.errors.invalid-input')
                                    @slot('tipoRitorno')
                                        feedback
                                    @endslot
                                    @slot('testoRitorno')
                                        {{ $errors->first('fine') }}
                                    @endslot
                                @endcomponent
                            @endif
                        </div>
                    </div>
                </form>
                @endslot
            @endcomponent
        @endcomponent
        <hr>

        {{--  //contenuto  --}}

         @php
             $giorni=["lu","ma","me","gi","ve","sa","do"];
             $giorniNomi=["Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica"];
         @endphp       

        @for ($i = 0; $i < count($giorni); $i++)
            @if ($incontri->whereStrict('giorno', $giorni[$i])->first())
                @component('partials.contenitore-orario')
                    @slot('giorno')
                        {{$giorniNomi[$i]}}:
                    @endslot
                    
                    @foreach ($incontri->whereStrict('giorno',$giorni[$i])->sortBy('inizio') as $incontro)
                        @component('partials.list.lista-incontro')
                            @slot('inizio')
                                {{date("G:i", strtotime($incontro->inizio))}}
                            @endslot
                            @slot('fine')
                                {{date("G:i", strtotime($incontro->fine))}}
                            @endslot
                            @slot('giorno')
                                {{$incontro->giorno}}
                            @endslot
                            @slot('id')
                                {{$incontro->id}}
                            @endslot
                            @slot('titolo')
                                {{$incontro->titolo}}
                            @endslot
                        @endcomponent
                    @endforeach
                
                @endcomponent   
            @endif
        @endfor

    @endcomponent
</div>
@endsection
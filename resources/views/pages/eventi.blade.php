@extends('layouts.app') 
@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('js/tablesorter.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
        });
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
                    Eventi
                @endcomponent
            @endslot
            <input class="form-control w-75 float-left" id="myInput" type="text" placeholder="Cerca evento...">
            <a href="#" class="btn btn-link btn-lg p-0 float-right" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static">
                <i class="fa fa-plus align-text-center"></i>
            </a>
            @component('partials.modals.form-template')
                @slot('modalId')
                    exampleModalCenter
                @endslot
                @slot('titolo')
                    Crea nuovo evento
                @endslot
                @slot('formId')
                    creaEvento
                @endslot
                @slot('contenuto')
                    @component('partials.forms.evento')
                        @slot('formId')
                            creaEvento
                        @endslot
                        @slot('regioni')
                            @foreach ($regioni as $regione)
                            <option value="{{$regione->id}}">{{$regione->nome}}</option>
                            @endforeach
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
            
        @endcomponent
        {{--  //contenuto  --}}
        @php
            $visione=["fa fa-globe","fa fa-lock"]
        @endphp
        @component('partials.tables.eventi')
            @slot('contenuto')
                @foreach ($eventi as $evento)
                    <tr>
                        <td scope="row" class="text"><span>{{$evento->titolo}}</span></td>
                        <td class="text"><span>{{$evento->descrizione}}</span></td>
                        <td class="text" data-value="{{strtotime($evento->data_inizio)}}"><span> {{date("d/M/Y H:i", strtotime($evento->data_inizio))}}</span></td>
                        <td class="text"><span>{{ $evento->indirizzo=="" ? "Chiesa" : $evento->comune->nome}}</span></td>
                        <td class="text text-center"><span><i class="{{$visione[$evento->privato]}} align-text-center"></span></td>
                        <td class="text text-center dropright">
                            <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v align-text-center p-1 px-2"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('eliminaEvento',['id' => $evento->id]) }}" onclick="event.preventDefault();document.getElementById('delete-form-{{$evento->id}}').submit();">
                                    <i class="fa fa-trash align-text-center p-1 px-2"></i> Elimina
                                </a>
                                <form id="delete-form-{{$evento->id}}" action="{{ route('eliminaEvento',['id' => $evento->id]) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete" />
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-pencil align-text-center p-1 px-2"></i> Modifica</a>
                            </div>
                        </td>           
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    @endcomponent
</div>
@endsection
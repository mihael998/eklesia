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
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
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
                        Comunicazioni ed Annunci
                    @endcomponent
                @endslot
                <input class="form-control w-75 float-left" id="myInput" type="text" placeholder="Cerca..">
                <a href="#" class="btn btn-link btn-lg p-0 float-right" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static">
                    <i class="fa fa-plus align-text-center"></i>
                </a>
                @component('partials.modals.form-template')
                    @slot('modalId')
                        exampleModalCenter
                    @endslot
                    @slot('titolo')
                        Crea nuova comunicazione o annuncio
                    @endslot
                    @slot('formId')
                        creaComunicazione
                    @endslot
                    @slot('contenuto')
                        @component('partials.forms.comunicazione.crea')
                            @slot('formId')
                                creaComunicazione
                            @endslot
                        @endcomponent
                    @endslot
                @endcomponent

            @endcomponent
            {{--  //contenuto  --}}
            @php
            $visione=["fa fa-globe","fa fa-lock"]
            @endphp
            @component('partials.tables.comunicazioni')
                @slot('contenuto')
                    @foreach ($comunicazioni as $comunicazione)
                        <tr>
                            <td scope="row" class="text"><span>{{$comunicazione->titolo}}</span></td>
                            <td class="text"><span>{{$comunicazione->descrizione}}</span></td>
                            @if ($comunicazione->data!="")
                                <td class="text" data-value="{{strtotime($comunicazione->data.$comunicazione->orario)}}"><span> {{date("d/M/Y H:i", strtotime($comunicazione->data.$comunicazione->orario))}}</span></td>
                            @else
                                <td class="text" data-value="0"><span>---</span></td>
                            @endif

                            <td class="text text-center"><span><i class="{{$visione[$comunicazione->privato]}} align-text-center"></span></td>
                                <td class="text text-center dropright">
                                    <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v align-text-center p-1 px-2"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('eliminaComunicazione',['id' => $comunicazione->id]) }}" onclick="event.preventDefault();document.getElementById('delete-form-{{$comunicazione->id}}').submit();">
                                            <i class="fa fa-trash align-text-center p-1 px-2"></i> Elimina
                                        </a>
                                        <form id="delete-form-{{$comunicazione->id}}" action="{{ route('eliminaComunicazione',['id' => $comunicazione->id]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete" />
                                        </form>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" >
                                            <i class="fa fa-pencil align-text-center p-1 px-2"></i> Modifica
                                        </a>

                                    </div>
                                </td>
                                {{-- @component('partials.modals.form-template')
                                    @slot('modalId')
                                        modificaModalCenter{{$comunicazione->id}}
                                    @endslot
                                    @slot('titolo')
                                        Modifica comunicazione
                                    @endslot
                                    @slot('formId')
                                        modificaComunicazione{{$comunicazione->id}}
                                    @endslot
                                    @slot('contenuto')
                                        @component('partials.forms.comunicazione.modifica')
                                            @slot('formId')
                                                {{$comunicazione->id}}
                                            @endslot
                                            @slot('titolo')
                                                {{$comunicazione->titolo}}
                                            @endslot
                                            @slot('privato')
                                                {{$comunicazione->privato}}
                                            @endslot
                                            @slot('prioritario')
                                                {{$comunicazione->prioritario}}
                                            @endslot
                                            @slot('descrizione')
                                                {{$comunicazione->descrizione}}
                                            @endslot
                                            @slot('data')
                                                {{$comunicazione->data}}
                                            @endslot
                                            @slot('orario')
                                                {{$comunicazione->orario}}
                                            @endslot
                                        @endcomponent
                                    @endslot
                                @endcomponent --}}
                            </tr>

                        @endforeach
                    @endslot
                @endcomponent
            @endcomponent
        </div>
    @endsection

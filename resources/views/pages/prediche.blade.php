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
        $(function() {
            $('.dropdown').on({
                "click": function(event) {
                  if ($(event.target).closest('.dropdown-toggle').length) {
                    $(this).data('closable', true);
                  } else {
                    $(this).data('closable', false);
                  }
                },
                "hide.bs.dropdown": function(event) {
                  hide = $(this).data('closable');
                  $(this).data('closable', true);
                  return hide;
                }
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
                    Prediche
                @endcomponent
            @endslot
            <input class="form-control w-75 float-left" id="myInput" type="text" placeholder="Cerca predica...">
            <a href="#" class="btn btn-link btn-lg p-0 float-right" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static">
                <i class="fa fa-plus align-text-center"></i>
            </a>
            @component('partials.modals.form-template')
                @slot('modalId')
                    exampleModalCenter
                @endslot
                @slot('titolo')
                    Aggiungi nuova predica
                @endslot
                @slot('formId')
                    creaPredica
                @endslot
                @slot('contenuto')
                    @component('partials.forms.predica')
                        @slot('formId')
                            creaPredica
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
            
        @endcomponent
        {{--  //contenuto  --}}
        @php
            $visione=["fa fa-globe","fa fa-lock"]
        @endphp
        @component('partials.tables.prediche')
            @slot('contenuto')
                @foreach ($prediche as $predica)
                    <tr>
                        <td scope="row" class="text"><span>{{$predica->titolo}}</span></td>
                        <td class="text"><span>{{$predica->autore}}</span></td>
                        <td class="text" data-value="{{strtotime($predica->data)}}"><span> {{date("d/M/Y", strtotime($predica->data))}}</span></td>
                        @php
                            $tags="";
                            foreach($predica->tags as $tagsPr)
                            {
                                $tags.="#".$tagsPr->nome." ";
                            }
                        @endphp
                        <td class="text"><span>{{ $tags}}</span></td>
                        <td class="text text-center">
                            <i class='mx-1 {{$predica->contenuto!=""?"fa fa-file-text-o align-text-center":"d-none"}}'></i>
                            <div class="dropdown keep-open" style="display:inline-block">
                                <a href="#" id="dropdownAudioLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                    <i class='mx-1 {{$predica->audio!=""?"fa fa-file-audio-o align-text-center":"d-none"}}'></i>
                                </a>
                                <div class="dropdown-menu p-2" aria-labelledby="dropdownAudioLink" id="dropdownAudio">
                                    <audio controls class="align-middle">
                                        <source src="{{ Storage::disk('gcs')->url('public/audio/prediche/'.$predica->audio) }}" type="audio/mpeg" />
                                        An html5-capable browser is required to play this audio. 
                                    </audio>
                                </div>
                            </div>
                        </td>
                        <td class="text text-center"><span><i class="{{$visione[$predica->privato]}} align-text-center"></span></td>
                        <td class="text text-center dropright">
                            <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v align-text-center p-1 px-2"></i>
                            </a>
                            <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('eliminaPredica',['id' => $predica->id]) }}" onclick="event.preventDefault();document.getElementById('delete-form-{{$predica->id}}').submit();">
                                    <i class="fa fa-trash align-text-center p-1 px-2"></i> Elimina
                                </a>
                                <form id="delete-form-{{$predica->id}}" action="{{ route('eliminaPredica',['id' => $predica->id]) }}" method="POST" style="display: none;">
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
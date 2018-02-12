@extends('layouts.app') 
@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('js/modifica-chiesa.js') }}"></script>
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
                    Modifica dettagli
                @endcomponent
            @endslot
        @endcomponent
        <hr>
        @include('partials.form-modifica-chiesa')
    @endcomponent
</div>
@endsection
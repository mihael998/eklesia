<div class="jumbotron my-4 position-relative py-4 bg-white" style="border-bottom: 4px solid #607D8B;border-top: 4px solid #607D8B;">
        <span class="badge badge-{{ $chiesa->abilitato==1 ? 'primary' : 'danger' }}">{{ $chiesa->abilitato==1 ? 'attiva' : 'non abilitata' }}</span>
    <h5 class="display-4">{{$chiesa->nome}} </h5>
    <ul class="list-inline">
        <li class="list-inline-item lead">Indirizzo:
            <strong> {{$chiesa->indirizzo}}</strong>
        </li>
        <li class="list-inline-item lead">Comune:
            <strong>{{$chiesa->comune->nome}}</strong>
        </li>

    </ul>
    <ul class="list-inline">
        <li class="list-inline-item lead">Sito:
            <strong>{{$chiesa->sito}}</strong>
        </li>
        <li class="list-inline-item lead">Email:
            <strong>{{$chiesa->email}}</strong>
        </li>
        <li class="list-inline-item lead">Telefono:
            <strong>{{$chiesa->telefono}}</strong>
        </li>
    </ul>

    <div class="position-absolute img-thumbnail" style="width:200px;height:230px;overflow:hidden;right:30px;bottom:-40px">
        <div style="position:relative;overflow: hidden;width:190px;height:220px">
        <img alt="Immagine Chiesa" style="position: absolute;top: -9999px;bottom: -9999px;left: -9999px;right: -9999px;margin: auto;min-width:100%;height:100%" class="" src="{{ $chiesa->foto!=""?asset('img/chiese/'.$chiesa->foto):asset('img/no_image.jpg') }}">
        </div>
    </div>
</div>
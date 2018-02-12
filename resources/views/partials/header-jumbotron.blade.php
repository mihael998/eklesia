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
        <img alt="Alunno" style="max-height:100%;width:100%" class="" src="{{ asset('img/chiese/'.$chiesa->foto) }}">
    </div>
</div>
<li class="list-group-item py-3 d-flex justify-content-between align-items-center orario">
    <span>{{$inizio}} - {{$fine}}</span>
    <span>{{$titolo}} </span>
    <span class="edit">
        {{--  <a href="#">
            <i class="fa fa-pencil fa-lg"></i>
        </a>  --}}
        

        <a href="{{ route('eliminaIncontro',['id' => $id]) }}" onclick="event.preventDefault();
                            document.getElementById('delete-form-{{$id}}').submit();">
            <i class="fa fa-close fa-lg text-danger"></i>
        </a>

        <form id="delete-form-{{$id}}" action="{{ route('eliminaIncontro',['id' => $id]) }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="delete" />
        </form>
    </span>
</li>
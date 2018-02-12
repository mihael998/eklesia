<form id="formIncontro" action="{{route('aggiungiIncontro')}}" method="post">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="titolo">Nome:</label>
            <input id="titolo" type="text" class="form-control" name="titolo" required>
        </div>
        <div class="form-group col-md-4">
            <label for="giorno">Giorno:</label>
            <select id="giorno" type="text" class="form-control" name="giorno" required>
                <option value="1">Lunedì</option>
                <option value="2">Martedì</option>
                <option value="3">Mercoledì</option>
                <option value="4">Giovedì</option>
                <option value="5">Venerdì</option>
                <option value="6">Sabato</option>
                <option value="7">Domenica</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inizio">Orario d'inzio:</label>
            <input id="inizio" type="time" class="form-control" name="inizio" required>
        </div>
        <div class="form-group col-md-4">
            <label for="fine">Orario fine:</label>
            <input id="fine" type="time" class="form-control" name="fine" required>
        </div>
    </div>
</form>
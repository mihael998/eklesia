
<table class="table table-hover mt-4" id="myTable">
    <thead>
        <tr >
            <th scope="col" class="" >Titolo</th>
            <th scope="col" class="">Descrizione</th>
            <th scope="col" id="sortDate" class="sort-data" onclick="sortTable()">Data</th>
            <th scope="col" class="text-center">Visibilità</th>
            <th scope="col" class="text-center"></th>
        </tr>
    </thead>
    <tbody>
        {{$contenuto}}
    </tbody>
</table>
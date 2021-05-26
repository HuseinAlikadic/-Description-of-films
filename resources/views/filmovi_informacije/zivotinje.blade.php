@extends('app')
@section('sadrzaj_stranice')
<br>
<p>Osnovni podaci o životinjama:</p>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Redni br.</th>
            <th>Naziv filma</th>
            <th>Kategorija</th>
            <th>Opis</th>
            <th>Autor</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($prikazi_podatke_o_zivotinjama as $index=>$item)
        <tr>
            <td>{{$index +1}}.</td>
            <td>{{$item->naziv_filma}}</td>
            <td>{{$item->kategorija}}</td>
            <td>{{$item->opis_filma}}</td>
            <td>{{$item->autor_dokumentarca}}</td>
            <td><i class="fas fa-edit"></i></td>
            <td><i class="fas fa-trash-alt"></i></td>
        </tr>
        @endforeach

    </tbody>
</table>




@endsection
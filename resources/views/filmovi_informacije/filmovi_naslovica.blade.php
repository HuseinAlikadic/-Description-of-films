@extends('app')
@section('sadrzaj_stranice')
<br>
<p>FILMOVI</p>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Naziv filma</th>
            <th>Kategorija </th>
            <th>Opis</th>
            <th>Godina izlaska </th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($baza_filmove as $item)
        <tr>
            <input type="hidden" class="filmID" value="{{$item->film_id}}">
            <input type="hidden" class="kategorijaFilm" value="{{$item->kategorija_id}}">
            <input type="hidden" class="godinaFilm" value="{{$item->godina_izlaska_id}}">
            <td class="imeFilma">{{$item->ime_film}}</td>
            <td>
                {{$item->kategorija_filma}}</td>
            <td class="opisFilm">{{$item->opsis_filma}}</td>
            <td> {{$item->godina_objave}}
            </td>
            <td><i class="fas fa-edit editFilm" data-toggle="modal" data-target="#editFilm"></i></td>
            <td><i class="fas fa-trash-alt"></i></td>
        </tr>

        @endforeach


    </tbody>
</table>
<!-- Modal for edit -->
<div class="modal" id="editFilm">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Film</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('/edit_film')}}" method="POST">
                <!-- Modal body -->
                @csrf
                <div class="modal-body">
                    <input class="film_id" type="hidden" name="id">
                    <div class="form-group">
                        <label>Ime Filma:</label>
                        <input type="text" class="form-control naziv_filma" name="naziv_filma" value="">
                    </div>
                    <div class="form-group">
                        <label>Kategorija:</label>
                        <select class="form-control  kategorija" name="kategorija_id">
                            <option value="">Select</option>
                            @foreach ($filmovi_kategorija as $item)
                            <option value="{{$item->id}}"> {{$item->kategorija}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>OpisFilma:</label>
                        <input type="textarea" class="form-control opis_filma" name="opis_filma" value="">
                    </div>
                    <div class="form-group">
                        <label>Godina:</label>
                        <select class="form-control  godina" name="godina_izlaska_id">
                            <option value="">Select</option>
                            @foreach ($godina_izdavanja as $item)
                            <option value="{{$item->id}}"> {{$item->godina_izlaska}}</option>
                            @endforeach
                        </select>
                    </div>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @endsection
    @section('skripta_stranice')
    $(document).ready(function(){
    $(".editFilm").click(function(){
    let filmId = $(this).closest('tr').find('.filmID').val();
    let imeFilma = $(this).closest('tr').find('.imeFilma').text();
    let kategorijaFilm = $(this).closest('tr').find('.kategorijaFilm').val();
    let opisFilm = $(this).closest('tr').find('.opisFilm').text();
    let godinaFilm = $(this).closest('tr').find('.godinaFilm').val();

    console.log(filmId);
    console.log(imeFilma);

    $('.film_id').val(filmId);
    $('.naziv_filma').val(imeFilma);
    $('.kategorija').val(kategorijaFilm);
    $('.opis_filma').val(opisFilm);
    $('.godina').val(godinaFilm);

    });
    });
    @endsection
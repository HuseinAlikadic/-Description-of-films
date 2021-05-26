<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilmoviSviPodaci;
use App\Models\FilmoviKategorija;
use App\Models\FilmoviGodinaIzlaska;
class FilmoviInformacijeController extends Controller
{
    public function prikazi_home(){
        return view('pocetna_stranica.home');
    }

    public function prikazi_filmove(){
        $baza_filmove=FilmoviSviPodaci::leftJoin('filmovi_kategorijas', 'filmovi_svi_podacis.kategorija_id', '=', 'filmovi_kategorijas.id')
        ->leftJoin('filmovi_godina_izlaskas', 'filmovi_svi_podacis.godina_izlaska_id', '=', 'filmovi_godina_izlaskas.id')

        ->select('filmovi_svi_podacis.naziv_filma as ime_film',
        'filmovi_svi_podacis.id as film_id',
        'filmovi_svi_podacis.kategorija_id as kategorija_id',
            'filmovi_kategorijas.kategorija as kategorija_filma',
            'filmovi_svi_podacis.opis_filma as opsis_filma',
            'filmovi_svi_podacis.godina_izlaska_id as godina_izlaska_id',
            'filmovi_godina_izlaskas.godina_izlaska as godina_objave')
        ->get();

        $filmovi_kategorija = FilmoviKategorija::all();
         $godina_izdavanja = FilmoviGodinaIzlaska::all();
        

        return view('filmovi_informacije.filmovi_naslovica', ['baza_filmove'=>$baza_filmove , 'filmovi_kategorija'=> $filmovi_kategorija,
        'godina_izdavanja' => $godina_izdavanja]);
    }
    public function edit_film_fun(Request $request)
    {
        //dobio podatke sa forme pod stringom je name iz blade, a $neko ime možemo definisati kako želimo
        $id = $request->get('id');
        $naziv_filma = $request->get('naziv_filma');
        $kategorija_id = $request->get('kategorija_id');
        $opis_filma = $request->get('opis_filma');
        $godina_izlaska_id = $request->get('godina_izlaska_id');
   
        //updejtujes tabelu sa novim podacima
        FilmoviSviPodaci::where('id',$id)->update(
            ['naziv_filma' => $naziv_filma,
            'kategorija_id' => $kategorija_id,
            'opis_filma' => $opis_filma,
            'godina_izlaska_id' => $godina_izlaska_id
           ] 
        );
    // redirect na link od stranice
        return redirect('prikazi_filmove_stranica');
    }
    
}
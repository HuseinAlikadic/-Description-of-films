<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumentarniAutori;
use App\Models\DokumentarniKategotija;
use App\Models\DokumentarniFilmoviSviPodaci;


class ZivotinjeInformacijeController extends Controller
{
    public function prikazi_sve_zivotinje(){
        $prikazi_podatke_o_zivotinjama=DokumentarniFilmoviSviPodaci::leftJoin('dokumentarni_kategotijas', 'dokumentarni_filmovi_svi_podacis.kategorija_id', '=', 'dokumentarni_kategotijas.id')
        ->leftJoin('dokumentarni_autoris', 'dokumentarni_filmovi_svi_podacis.autor_id', '=', 'dokumentarni_autoris.id')

        ->select('dokumentarni_filmovi_svi_podacis.ime_filma as naziv_filma',
                'dokumentarni_kategotijas.kategorija as kategorija',
                'dokumentarni_filmovi_svi_podacis.opis_filma as opis_filma',
                'dokumentarni_autoris.autor as autor_dokumentarca')
        ->get();


        return view('filmovi_informacije.zivotinje', ['prikazi_podatke_o_zivotinjama'=>$prikazi_podatke_o_zivotinjama,]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FilmoviKategorija::insert([
            ['kategorija'=>'Akcijski filmovi'],
            ['kategorija'=>'Animirani filmovi'],
            ['kategorija'=>'Biografski filmovi'],
            ['kategorija'=>'Dokumentarni filmovi']
        ]);

        \App\Models\FilmoviGodinaIzlaska::insert([
            ['godina_izlaska'=>'2015/2016'],
            ['godina_izlaska'=>'2016/2017'],
            ['godina_izlaska'=>'2017/2018'],
            ['godina_izlaska'=>'2018/2019'],
            ['godina_izlaska'=>'2019/2020'],
            ['godina_izlaska'=>'2020/2021']    
        ]);

        \App\Models\FilmoviSviPodaci::insert([
            ['naziv_filma'=>'Porodićno blago',
             'kategorija_id'=>1,
              'opis_filma'=>'Ovaj film govori o porodićnim odnosima.',
            'godina_izlaska_id'=>2],

            ['naziv_filma'=>'Poronađi blago',
            'kategorija_id'=>3 ,
             'opis_filma'=>'Ovaj film govori o novcu.',
           'godina_izlaska_id'=>5]
           
        ]);

        \App\Models\DokumentarniKategotija::insert([
            ['kategorija'=>'Domaće životinje'],
            ['kategorija'=>'Divlje životinje']
           
        ]);

        \App\Models\DokumentarniAutori::insert([
            ['autor'=>'Husein Alikadić'],
            ['autor'=>'Emina Alikadić']
           
        ]);

        \App\Models\DokumentarniFilmoviSviPodaci::insert([
            ['ime_filma'=>'Mačke',
              'kategorija_id'=>1,
            'opis_filma'=>'Mačke su domaće životinje.',
             'autor_id'=>1],

             ['ime_filma'=>'Lavovi',
             'kategorija_id'=>2,
           'opis_filma'=>'Lavovi su divlje životinje.',
            'autor_id'=>2]   
           
        ]);
    }
}
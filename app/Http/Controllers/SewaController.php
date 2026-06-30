<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SewaController extends Controller
{

    public function index()
    {

        $sewa = [

            [
                'id'=>1,
                'nama'=>'Ahda',
                'kamar'=>'Thursina 1',
                'mulai'=>'01-01-2026',
                'jatuh_tempo'=>'01-07-2026',
                'status'=>'Aktif'
            ],

        ];


        return view('user.kontrak',compact('sewa'));

    }



public function detail($id)
{

    $data = [

        'nama'=>'Ahda',
        'kamar'=>'Thursina 1',
        'mulai'=>'01-01-2026',
        'jatuh_tempo'=>'01-07-2026',
        'status'=>'Aktif'

    ];


    return view('user.detail-sewa', compact('data'));

}



    public function kirimNotif($id)
    {


        return back()->with(
            'success',
            'Notifikasi jatuh tempo berhasil dikirim ke penyewa'
        );


    }



}
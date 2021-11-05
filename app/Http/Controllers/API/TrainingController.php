<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $types = $request->input('types');

        $konten = $request->input('konten');
        $hargaOnline = $request->input('hargaOnline');
        $hargaOffline = $request->input('hargaOffline');

        $keterangan = $request->input('keterangan');
        $jadwalTraining = $request->input('jadwalTraining');
        $running = $request->input('running');

        if($id){
            $training = Training::find($id);

            if($training)
            {
                return ResponseFormatter::success(
                    $training,
                    'Data Produk Berhasil Diambil'
                );
            }
            else{
                return ResponseFormatter::error(
                    null,
                    'Data Produk Tidak Ada',
                    404
                );
            }
        }

        $training = Training::query();

        if($name)
        {
            $training->where('name', 'like', '%' . $name . '%');
        }
        if($types)
        {
            $training->where('types', 'like', '%' . $types . '%');
        }
        if($konten)
        {
            $training->where('konten', 'like', '%' . $konten . '%');
        }
        if($hargaOnline)
        {
            $training->where('hargaOnline', 'like', '%' . $hargaOnline . '%');
        }
        if($hargaOffline)
        {
            $training->where('hargaOffline', 'like', '%' . $hargaOffline . '%');
        }
        if($keterangan)
        {
            $training->where('keterangan', 'like', '%' . $keterangan . '%');
        }
        if($jadwalTraining)
        {
            $training->where('jadwalTraining', 'like', '%' . $jadwalTraining . '%');
        }
        if($running)
        {
            $training->where('running', 'like', '%' . $running . '%');
        }

        return ResponseFormatter::success(
            $training->paginate($limit),
            'Data List Produk Berhasil Diambil'
        );


    }
}

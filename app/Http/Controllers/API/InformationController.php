<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $types = $request->input('types');

        if($id){
            $information = Information::find($id);

            if($information)
            {
                return ResponseFormatter::success(
                    $information,
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

        $information = Information::query();

        if($name)
        {
            $information->where('name', 'like', '%' . $name . '%');
        }
        if($types)
        {
            $information->where('types', 'like', '%' . $types . '%');
        }

        return ResponseFormatter::success(
            $information->paginate($limit),
            'Data List Produk Berhasil Diambil'
        );


    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahIndonesiaController extends Controller
{
    public function kabupaten(Request $request){
        $query = DB::table('indonesia_cities')->get();
        if(isset($request->q)){
            $query = DB::table('indonesia_cities')->where('name' ,'like','%'. $request->term .'%')->get();
        }
        return response()->json($query);
    }
    public function kecamatan(Request $request){
        $query = DB::table('indonesia_districts')->get();
        if(isset($request->q)){
            $query = DB::table('indonesia_districts')->where('name' ,'Like','%'. $request->term .'%')->get();
        }
        return response()->json($query);
    }
}

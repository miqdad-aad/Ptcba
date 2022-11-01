<?php

namespace App\Http\Controllers;

use App\Models\DetailSuratJalanModels;
use App\Models\PesananModels;
use App\Models\SuratJalanModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SuratJalanModels::leftjoin('users as ta','ta.id','surat_jalan.id_driver')
            ->select('ta.name as nama_driver','surat_jalan.*');

            if(Auth::user()->role == 2){
                $data->where('id_driver', Auth::user()->id);
            }
            $data->get();
            $hasil = $data->get();
            return Datatables::of($hasil)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '';
                        if(Auth::user()->role == 2 || Auth::user()->role == 3){
                            $btn .= '<a href="'. url('surat_jalan/detail/'. $row->id_surat_jalan) .'" class="edit btn btn-primary btn-sm">View</a>';
                        }
                        if(Auth::user()->role == 3){
                            $btn .= ' <a href="'. url('surat_jalan/edit/'. $row->id_surat_jalan) .'" class="edit btn btn-info btn-sm">Edit</a>';
                            $btn .= ' <a href="'. url('surat_jalan/hapus/'. $row->id_surat_jalan) .'" class="edit btn btn-danger btn-sm">Hapus</a>';
                        }
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.surat_jalan.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.surat_jalan.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $kode = 'SJLN'.rand(10,20). date('Ym'). (SuratJalanModels::count() + 1);
        try {
            SuratJalanModels::insert([
                'kode_surat_jalan'  => $kode,
                'id_driver' => $request->id_driver,
                'tgl_muat' => date('Y-m-d', strtotime($request->tgl_muat)),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
            $id_surat_jalan = DB::getPdo()->lastInsertId();

            foreach($request->detail as $k){
                $k = (object) $k;
                DetailSuratJalanModels::insert([
                    'id_pesanan'    => $k->id_pesanan,
                    'id_surat_jalan'   => $id_surat_jalan,
                ]);
                PesananModels::where('id_pesanan', $k->id_pesanan)->update([
                    'status_pengiriman' => 2
                ]);
            }

            DB::commit();
           return redirect()->route('surat_jalan.index');
        } catch (\Exception $e) {
            printJSON($e->getMessage());
            DB::rollback();
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SuratJalanModels::leftjoin('users as ta','ta.id','surat_jalan.id_driver')
        ->select('ta.name as nama_driver','surat_jalan.*')
        ->where('surat_jalan.id_surat_jalan', $id)
        ->first();

        $detail = PesananModels::leftjoin('indonesia_cities as ta','ta.id','pesanan.kabupaten_pengambilan')
        ->leftjoin('indonesia_districts as tb','tb.id','pesanan.kecamatan_pengambilan')
        ->leftjoin('indonesia_cities as tc','tc.id','pesanan.kabupaten_penerima')
        ->leftjoin('indonesia_districts as td','td.id','pesanan.kecamatan_penerima')
        ->leftjoin('users as te','te.id','pesanan.id_user')
        ->leftjoin('status_pesanan as tf','tf.id_status_pesanan','pesanan.status_pengiriman')
        ->leftjoin('detail_pesanan as tg','tg.id_pesanan','pesanan.id_pesanan')
        ->leftjoin('detail_surat_jalan as th','th.id_pesanan','pesanan.id_pesanan')
        ->select(DB::raw('sum(tg.total) as berat_pesanan,count(tg.id_pesanan) as total_barang ,pesanan.*, ta.name as nama_kabupaten_pengambilan, tb.name as nama_kecamatan_pengambilan,tc.name as nama_kabupaten_penerima,td.name as nama_kecamatan_penerima,tf.nama_status,te.name as nama_user'))
        ->where('th.id_surat_jalan',$id)
        ->groupby('pesanan.id_pesanan')->get();
        return view('admin.surat_jalan.detail', compact('data','detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SuratJalanModels::leftjoin('users as ta','ta.id','surat_jalan.id_driver')
        ->select('ta.name as nama_driver','surat_jalan.*')
        ->where('surat_jalan.id_surat_jalan', $id)
        ->first();

        $detail = PesananModels::leftjoin('indonesia_cities as ta','ta.id','pesanan.kabupaten_pengambilan')
        ->leftjoin('indonesia_districts as tb','tb.id','pesanan.kecamatan_pengambilan')
        ->leftjoin('indonesia_cities as tc','tc.id','pesanan.kabupaten_penerima')
        ->leftjoin('indonesia_districts as td','td.id','pesanan.kecamatan_penerima')
        ->leftjoin('users as te','te.id','pesanan.id_user')
        ->leftjoin('status_pesanan as tf','tf.id_status_pesanan','pesanan.status_pengiriman')
        ->leftjoin('detail_pesanan as tg','tg.id_pesanan','pesanan.id_pesanan')
        ->leftjoin('detail_surat_jalan as th','th.id_pesanan','pesanan.id_pesanan')
        ->select(DB::raw('sum(tg.total) as berat_pesanan,count(tg.id_pesanan) as total_barang ,pesanan.*, ta.name as nama_kabupaten_pengambilan, tb.name as nama_kecamatan_pengambilan,tc.name as nama_kabupaten_penerima,td.name as nama_kecamatan_penerima,tf.nama_status,te.name as nama_user'))
        ->where('th.id_surat_jalan',$id)
        ->groupby('pesanan.id_pesanan')->get();
        return view('admin.surat_jalan.edit', compact('data','detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            SuratJalanModels::where('id_surat_jalan',  $request->id_surat_jalan)->update([
                'id_driver' => $request->id_driver,
                'tgl_muat' => date('Y-m-d', strtotime($request->tgl_muat)),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
            $id_surat_jalan = $request->id_surat_jalan;
            DetailSuratJalanModels::where('id_surat_jalan', $request->id_surat_jalan)->delete();
            if(isset($request->remove)){
                foreach($request->remove as $id_pesanan){
                    PesananModels::where('id_pesanan', $id_pesanan)->update([
                        'status_pengiriman' => 1
                    ]);
                }
            }

            foreach($request->detail as $k){
                $k = (object) $k;
                DetailSuratJalanModels::insert([
                    'id_pesanan'    => $k->id_pesanan,
                    'id_surat_jalan'   => $id_surat_jalan,
                ]);
                PesananModels::where('id_pesanan', $k->id_pesanan)->update([
                    'status_pengiriman' => 2
                ]);
            }

            DB::commit();
           return redirect()->route('surat_jalan.index');
        } catch (\Exception $e) {
            printJSON($e->getMessage());
            DB::rollback();
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

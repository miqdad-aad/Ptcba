<?php

namespace App\Http\Controllers;

use App\Models\DetailPesananModels;
use App\Models\PesananModels;
use App\Models\UpdateLokasiModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Services\Midtrans\CreateSnapTokenService;
use Laravel\Ui\Presets\React;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PesananModels::leftjoin('indonesia_cities as ta','ta.id','pesanan.kabupaten_pengambilan')
            ->leftjoin('indonesia_districts as tb','tb.id','pesanan.kecamatan_pengambilan')
            ->leftjoin('indonesia_cities as tc','tc.id','pesanan.kabupaten_penerima')
            ->leftjoin('indonesia_districts as td','td.id','pesanan.kecamatan_penerima')
            ->leftjoin('users as te','te.id','pesanan.id_user')
            ->leftjoin('status_pesanan as tf','tf.id_status_pesanan','pesanan.status_pengiriman')
            ->leftjoin('detail_pesanan as tg','tg.id_pesanan','pesanan.id_pesanan')
            ->select(DB::raw('sum(tg.total) as berat_pesanan,count(tg.id_pesanan) as total_barang ,pesanan.*, ta.name as nama_kabupaten_pengambilan, tb.name as nama_kecamatan_pengambilan,tc.name as nama_kabupaten_penerima,td.name as nama_kecamatan_penerima,tf.nama_status,te.name as nama_user'));
            if(isset($request->id_status)){
                $data->whereIn('status_pengiriman', [1]);
            }
            if(Auth::user()->role == 1){
                $data->where('pesanan.id_user', Auth::user()->id);
            }
            $data->groupby('pesanan.id_pesanan')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="'. url('pesanan/detail/'. $row->id_pesanan) .'" class="edit btn btn-primary btn-sm">View</a>';
                           if($row->status_pembayaran == null){
                               $btn .= ' <button class="btn-bayar btn btn-success btn-sm">Bayar</button>';
                               $btn .= ' <a href="'. url('pesanan/edit/'. $row->id_pesanan) .'" class="edit btn btn-info btn-sm">Edit</a>';
                               $btn .= ' <a href="'. url('pesanan/hapus/'. $row->id_pesanan) .'" class="edit btn btn-danger btn-sm">Hapus</a>';
                            }else{
                            }
                            if($row->status_pengiriman != 1){
                               $btn .= ' <a href="'. url('update/lokasi/'. $row->id_pesanan) .'" class="edit btn btn-success btn-sm ">Riwayat Lokasi</a>';
                           }

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pesanan.view');
    }
    public function tracking(Request $request)
    {
        
        $data = UpdateLokasiModels::join('pesanan as ta','ta.id_pesanan','lokasi_pesanan.id_pesanan')->select(DB::raw('ta.kode_pesanan,lokasi_pesanan.lokasi_pesanan, lokasi_pesanan.created_at as tgl_lokasi'))->where('ta.kode_pesanan', $request->no_pesanan)->get();
      
        return Datatables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pesanan.add');

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
        $kode = 'PES'.rand(10,20). date('Ym'). (PesananModels::count() + 1);
        try {
            $midtrans = new CreateSnapTokenService($request->all());
            $snapToken = $midtrans->getSnapToken();
            $token = $snapToken;
            PesananModels::insert([
                'kode_pesanan'  => $kode,
                'tempat_pengambilan' => $request->tempat_pengambilan,
                'kabupaten_pengambilan' => $request->kabupaten_pengambilan,
                'kecamatan_pengambilan' => $request->kecamatan_pengambilan,
                'alamat_pengambilan'    => $request->alamat_pengambilan,
                'nama_penerima'     => $request->nama_penerima,
                'kabupaten_penerima' => $request->kabupaten_penerima,
                'kecamatan_penerima' => $request->kecamatan_penerima,
                'alamat_penerima'    => $request->alamat_penerima,
                'jenis_transportasi'    => $request->jenis_transportasi,
                'nomor_penerima'    => $request->nomor_penerima,
                'status_pengiriman' => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
                'id_user'   => Auth::user()->id,
                'token' => $token,
                'total_pesanan' => $request->total_pesanan
            ]);
            $id_pesanan = DB::getPdo()->lastInsertId();

            foreach($request->detail_barang as $k){
                $k = (object) $k;
                DetailPesananModels::insert([
                    'id_pesanan'    => $id_pesanan,
                    'nama_barang'   => $k->nama_barang,
                    'panjang'  => $k->panjang,
                    'lebar'  => $k->lebar,
                    'tinggi'  => $k->tinggi,
                    'total'  => $k->total,
                ]);
            }

            DB::commit();
           return redirect()->route('pesanan.index');
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
        $data = PesananModels::leftjoin('indonesia_cities as ta','ta.id','pesanan.kabupaten_pengambilan')
        ->leftjoin('indonesia_districts as tb','tb.id','pesanan.kecamatan_pengambilan')
        ->leftjoin('indonesia_cities as tc','tc.id','pesanan.kabupaten_penerima')
        ->leftjoin('indonesia_districts as td','td.id','pesanan.kecamatan_penerima')
        ->leftjoin('users as te','te.id','pesanan.id_user')
        ->leftjoin('status_pesanan as tf','tf.id_status_pesanan','pesanan.status_pengiriman')
        ->leftjoin('detail_pesanan as tg','tg.id_pesanan','pesanan.id_pesanan')
        ->select(DB::raw('sum(tg.berat_pesanan) as berat_pesanan,count(tg.id_pesanan) as total_pesanan ,pesanan.*, ta.name as nama_kabupaten_pengambilan, tb.name as nama_kecamatan_pengambilan,tc.name as nama_kabupaten_penerima,td.name as nama_kecamatan_penerima,tf.nama_status,te.name as nama_user'))
        ->where('pesanan.id_pesanan',$id)
        ->groupby('pesanan.id_pesanan')
        ->first();


        $detail = DetailPesananModels::where('id_pesanan', $id)->get();
        return view('admin.pesanan.detail', compact('data','detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PesananModels::leftjoin('indonesia_cities as ta','ta.id','pesanan.kabupaten_pengambilan')
        ->leftjoin('indonesia_districts as tb','tb.id','pesanan.kecamatan_pengambilan')
        ->leftjoin('indonesia_cities as tc','tc.id','pesanan.kabupaten_penerima')
        ->leftjoin('indonesia_districts as td','td.id','pesanan.kecamatan_penerima')
        ->leftjoin('users as te','te.id','pesanan.id_user')
        ->leftjoin('status_pesanan as tf','tf.id_status_pesanan','pesanan.status_pengiriman')
        ->leftjoin('detail_pesanan as tg','tg.id_pesanan','pesanan.id_pesanan')
        ->select(DB::raw('sum(tg.berat_pesanan) as berat_pesanan,count(tg.id_pesanan) as total_pesanan ,pesanan.*, ta.name as nama_kabupaten_pengambilan, tb.name as nama_kecamatan_pengambilan,tc.name as nama_kabupaten_penerima,td.name as nama_kecamatan_penerima,tf.nama_status,te.name as nama_user'))
        ->where('pesanan.id_pesanan',$id)
        ->groupby('pesanan.id_pesanan')
        ->first();
        
        $kode_penerima = DB::table('indonesia_cities')->where('id', $data->kabupaten_penerima)->pluck('province_code');

        $detail = DetailPesananModels::where('id_pesanan', $id)->get();
        return view('admin.pesanan.edit', compact('data','detail','kode_penerima'));
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
            $dataOld = PesananModels::where('id_pesanan', $request->id_pesanan)->first();

            $token = $dataOld->token;
            if($dataOld->total_pesanan != $request->total_pesanan){
                $midtrans = new CreateSnapTokenService($request->all());
                $snapToken = $midtrans->getSnapToken();
                $token = $snapToken;
            }
            PesananModels::where('id_pesanan', $request->id_pesanan)->update([
                'tempat_pengambilan' => $request->tempat_pengambilan,
                'kabupaten_pengambilan' => $request->kabupaten_pengambilan,
                'kecamatan_pengambilan' => $request->kecamatan_pengambilan,
                'alamat_pengambilan'    => $request->alamat_pengambilan,
                'nama_penerima'     => $request->nama_penerima,
                'kabupaten_penerima' => $request->kabupaten_penerima,
                'kecamatan_penerima' => $request->kecamatan_penerima,
                'alamat_penerima'    => $request->alamat_penerima,
                'jenis_transportasi'    => $request->jenis_transportasi,
                'nomor_penerima'    => $request->nomor_penerima,
                'updated_at'    => date('Y-m-d H:i:s'),
                'token' => $token,
                'total_pesanan' => $request->total_pesanan
            ]);
            $id_pesanan = $request->id_pesanan;
            DetailPesananModels::where('id_pesanan', $request->id_pesanan)->delete();
            foreach($request->detail_barang as $k){
                $k = (object) $k;
                DetailPesananModels::insert([
                    'id_pesanan'    => $id_pesanan,
                    'nama_barang'   => $k->nama_barang,
                    'panjang'  => $k->panjang,
                    'lebar'  => $k->lebar,
                    'tinggi'  => $k->tinggi,
                    'total'  => $k->total,
                ]);
            }

            DB::commit();
           return redirect()->route('pesanan.index');
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
        PesananModels::where('id_pesanan', $id)->delete();
        DetailPesananModels::where('id_pesanan', $id)->delete();
        return redirect()->route('pesanan.index');
    }

    public function storeUpdateLokasi(Request $request){
        DB::beginTransaction();
        try {
            UpdateLokasiModels::insert([
                'id_pesanan' => $request->id_pesanan,
                'lokasi_pesanan' => $request->lokasi,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            DB::commit();
           return redirect()->back();
        } catch (\Exception $e) {
            printJSON($e->getMessage());
            DB::rollback();
            // something went wrong
        }
    }

    public function updateLokasi($id){
        $data = PesananModels::leftjoin('indonesia_cities as ta','ta.id','pesanan.kabupaten_pengambilan')
        ->leftjoin('indonesia_districts as tb','tb.id','pesanan.kecamatan_pengambilan')
        ->leftjoin('indonesia_cities as tc','tc.id','pesanan.kabupaten_penerima')
        ->leftjoin('indonesia_districts as td','td.id','pesanan.kecamatan_penerima')
        ->leftjoin('users as te','te.id','pesanan.id_user')
        ->leftjoin('status_pesanan as tf','tf.id_status_pesanan','pesanan.status_pengiriman')
        ->leftjoin('detail_pesanan as tg','tg.id_pesanan','pesanan.id_pesanan')
        ->select(DB::raw('sum(tg.berat_pesanan) as berat_pesanan,count(tg.id_pesanan) as total_pesanan ,pesanan.*, ta.name as nama_kabupaten_pengambilan, tb.name as nama_kecamatan_pengambilan,tc.name as nama_kabupaten_penerima,td.name as nama_kecamatan_penerima,tf.nama_status,te.name as nama_user'))
        ->where('pesanan.id_pesanan',$id)
        ->groupby('pesanan.id_pesanan')
        ->first();

        $lokasi = UpdateLokasiModels::where('id_pesanan', $id)->get();
        return view('admin.pesanan.update_lokasi', compact('data','lokasi'));

    }

    public function bayarSukses(Request $request){
        PesananModels::where('kode_pesanan', $request->kode_pesanan)->update([
            'status_pembayaran' => '1'
        ]);
        return response()->json('200');
    }
}

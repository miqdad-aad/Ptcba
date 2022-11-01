<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use DataTables;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role',1)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = ' <a href="'. url('pelanggan/edit/'. $row->id) .'" class="edit btn btn-info btn-sm">Edit</a>';
                           $btn .= ' <a href="'. url('pelanggan/hapus/'. $row->id) .'" class="edit btn btn-danger btn-sm">Hapus</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view ('admin.pelanggan.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.pelanggan.add');
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
        try {
            $filename = '';
            if($request->file('foto')){
                $file= $request->file('foto');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('foto-pelanggan'), $filename);
            }
            User::insert([
                'name'  => $request->nama_lengkap,
                'email' => $request->alamat_email,
                'nomor_hp' => $request->nomor_hp,
                'password' => Hash::make($request->password),
                'alamat'     => $request->alamat,
                'foto'  => $filename,
                'role'  => 1
            ]);

            DB::commit();
           return redirect()->route('pelanggan.index');
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
        $data = User::where('id',$id)->first();
        return view ('admin.pelanggan.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $oldData = User::where('id', $request->id_user)->first();
            $filename = $oldData->foto;
            if($request->file('foto')){
                $file= $request->file('foto');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('foto-pelanggan'), $filename);
            }
            User::where('id', $request->id_user)->update([
                'name'  => $request->nama_lengkap,
                'email' => $request->alamat_email,
                'nomor_hp' => $request->nomor_hp,
                'password' => $request->password != null ? Hash::make($request->password) : $oldData->password,
                'alamat'     => $request->alamat,
                'foto'  => $filename,
                'role'  => 1
            ]);

            DB::commit();
           return redirect()->route('pelanggan.index');
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
    public function select2(Request $request){
        $query = User::where('role',2)->get();
        if(isset($request->q)){
            $query = User::where('role',2)->where('name' ,'like','%'. $request->term .'%')->get();
        }
        return response()->json($query);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index(){

        // $data = Pegawai::all();
        $data = Pegawai::with('jabatan', 'golongan')->get();

        return response()->json($data, 200);
    }

    // penambahan data
    public function add(Request $request){

        // proses validasi
        $validate = Validator::make($request->all(), [
            'nip' => 'required',
            'nama_pegawai' => 'required',
            'id_jabatan' => 'required',
            'id_golongan' => 'required',
            'status' => 'required',
            'alamat' => 'required'
        ]);

        if($validate->fails()){
            return $validate->errors();
        }

        // proses simpan
        $data = Pegawai::create($request->all());
            return response()->json([
                'pesan' => 'data berhasil disimpan',
                'data' => $data
            ], 201);
    }

    // menampilkan data berdasarkan id(hanya menampilkan satu data)
    public function show($id){

        $data = Pegawai::with('jabatan', 'golongan')->where('id',$id)->first();
        // $data = Pegawai::where('id', $id)->first();
            if(empty($data)){
                return response()->json([
                    'pesan' => 'data tidak tersedia',
                    'data' => $data
                ], 404);
            }
            return response()->json([
                'pesan' => 'data tersedia',
                'data' => $data
            ], 200);

    }

    // delete data berdasarkan id
    public function destroy($id){


        // $data = Pegawai::where('id',$id)->first();
        $data = Pegawai::with('jabatan', 'golongan')->where('id',$id)->first();
            if(empty($data)){
            return response()->json([
                'pesan' => 'data tidak tersedia',
                'data' => $data
            ], 404);
        }

        $data->delete();
            return response()->json([
            'pesan' => 'data berhasil dihapus'
        ],200);
    }

    // update data
    public function update(Request $request, $id){

    // pengecekan data
    $data = Pegawai::where('id',$id)->first();
        if(empty($data)){
            return response()->json([
                'pesan' => 'data tidak tersedia',
                'data' => $data
            ], 404);
        }

    // proses validasi
    $validate = Validator::make($request->all(), [
        'nip' => 'required',
        'nama_pegawai' => 'required',
        'id_jabatan' => 'required',
        'id_golongan' => 'required',
        'status' => 'required',
        'alamat' => 'required'
    ]);


    if($validate->fails()){
        return $validate->errors();
    }

    // proses update
    $data->update($request->all());
    return response()->json([
        'pesan' => 'data berhasil diUpdate',
        'data' => $data
    ], 201);
    }
}

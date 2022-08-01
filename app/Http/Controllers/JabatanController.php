<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    
    // menampilkan semua data dari database
    public function index(){

        $data = Jabatan::all();

        return response()->json($data, 200);
    }

    // penambahan data
    public function add(Request $request){

        // proses validasi
        $validate = Validator::make($request->all(), [
            'kode_jabatan' => 'required',
            'nama_jabatan' => 'required',
            'tahun_pengangkatan' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required'
        ]);

        if($validate->fails()){
            return $validate->errors();
        }

        // proses simpan
        $data = Jabatan::create($request->all());
            return response()->json([
                'pesan' => 'data berhasil disimpan',
                'data' => $data
            ], 201);
    }
    
    // menampilkan data berdasarkan id(hanya menampilkan satu data)
    public function show($id){

        // $data = Jabatan::with('category')->where('id',$id)->first();
        $data = Jabatan::where('id', $id)->first();
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
        
        $data = Jabatan::where('id',$id)->first();
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
    $data = Jabatan::where('id',$id)->first();
        if(empty($data)){
            return response()->json([
                'pesan' => 'data tidak tersedia',
                'data' => $data
            ], 404);
        }

    // proses validasi
    $validate = Validator::make($request->all(), [
        'kode_jabatan' => 'required',
        'nama_jabatan' => 'required',
        'tahun_pengangkatan' => 'required',
        'gaji_pokok' => 'required',
        'tunjangan' => 'required'
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

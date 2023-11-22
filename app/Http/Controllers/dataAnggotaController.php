<?php

namespace App\Http\Controllers;

use App\Models\DataAnggotaModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class dataAnggotaController extends Controller
{
    public function getAllData2() {
        $data = DataAnggotaModels::all();
        return view ('admin.tambahAnggota', compact('data'));
    }

    public function createData2(Request $request) 
{
    $validator = Validator::make($request->all(), [
        'namaAnggota' => 'required',
        'username' => 'required',
        'password' => 'required',
        
    ], [
        'namaAnggota.required' => 'Nama Anggota wajib diisi',
        'username' => 'Username wajib diisi ',
        'password' => 'Password wajib diisi',
    ]);

    if ($validator->fails()) { 
        $message = $validator->errors()->all();
        Alert::error('Gagal', $message);
        return redirect()->back();
    }

    $data = new DataAnggotaModels();
    $data->namaAnggota = $request->input('namaAnggota');
    $data->username = $request->input('username');
    $data->password = $request->input('password');
   

    $data->save();

    if ($data) {
        Alert::success('Tambah data sukses');
        return back();
    } else {
        Alert::error('Gagal tambah data');
        return back();
    }
}
public function deleteData2($id){
    $data = DataAnggotaModels::where('id', $id)->first();
    $data->delete();
    Alert::success('validasi sukses');
    return redirect()->back();
}
}

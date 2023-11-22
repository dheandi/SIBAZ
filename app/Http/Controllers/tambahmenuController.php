<?php

namespace App\Http\Controllers;

use App\Models\tambahmenuModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class tambahmenuController extends Controller
{
    public function getAllDataMenu() {
        $data = tambahmenuModels::all();
        return view ('admin.tambahMenu', compact('data'));
    }

    public function tambahdatamenu(Request $request) 
    {
    $validator = Validator::make($request->all(), [
        'nama_menu' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'gambar' => 'required|mimes:png,jpeg,jpg',
        
    ], [
        'nama_menu.required' => 'Nama Anggota wajib diisi',
        'deskripsi' => 'deskripsi wajib diisi ',
        'harga' => 'harga wajib diisi',
        'gambar' => 'gambar wajib diisi',
    ]);
    
    if ($validator->fails()) { 
        $message = $validator->errors()->all();
        Alert::error('Gagal', $message);
        return redirect()->back();
    }
    
    $data = new tambahmenuModels();
    $data->nama_menu = $request->input('nama_menu');
    $data->deskripsi = $request->input('deskripsi');
    $data->harga = $request->input('harga');
    if ($request->hasfile('gambar')) {
        $file = $request->file('gambar');
        $filename = $file->getClientOriginalName();
        $file->move('uploads/datamenu/', $filename);
        $data->gambar = $filename;
    
    
    $data->save();
    
    if ($data) {
        Alert::success('Tambah data sukses');
        return back();
    } else {
        Alert::error('Gagal tambah data');
        return back();
    }
    }
}
public function hapusdatamenu($id){
    $data = tambahmenuModels::where('id', $id)->first();
    $data->delete();
    Alert::success('validasi sukses');
    return redirect()->back();
}


}



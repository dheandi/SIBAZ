<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;



class DataPesanaController extends Controller
{
    public function getAllData()
{
    $data = DataPesanan::all();
    return view('admin.dataPesanan', compact('data'));
}

public function getAllData1()
{
    $data = DataPesanan::all();
    return view('admin.dashboard', compact('data'));
}

public function createData(Request $request) 
{
    $data = new DataPesanan();
    $data->id_user = $request->input('id_user');
    $data->id_produk = $request->input('id_produk');
    $data->nama_pemesan = $request->input('nama_pemesan');
    $data->alamat = $request->input('alamat');
    $data->no_hp = $request->input('no_hp');
    $data->jumlah = $request->input('jumlah');
    $data->total_harga = $request->input('total_harga');
    $data->created_at;

    $data->save();

    if ($data) {
        Alert::success('Tambah data sukses');
        return back();
    } else {
        Alert::error('Gagal tambah data');
        return back();
    }
}

public function EditDataById($id){
    $data =  DataPesanan::where('id', $id)->first();
    return view('admin.editpesanan')->with('data', $data);
}
public function UpdateData(request $request,$id){
    $validation = Validator::make($request->all(),
    [
        'id_user' => 'required',
        'id_produk' => 'required',
        'nama_pemesan' => 'required',
        'jumlah' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'total_harga' => 'required',
    ], [
        'id_user.required' => 'Form produk tidak boleh kosong',
        'id_produk.required' => 'Form nama pj tidak boleh kosong',
        'nama_pemesan' => 'Form nama pemesan wajib diisi',
        'jumlah' => 'Form jumlah tidak boleh kosong',
        'alamat' => 'Form alamat wajib diisi ',
        'no_hp' => 'Form nomor hp wajib diisi',
        'total_harga' => 'wajib ',
    ]);
    if($validation->fails()){
        $errors = $validation->errors()->first();
        Alert::error('validasi gagal', $errors);
        return redirect()->back();
    }
    $data =  DataPesanan::where('id', $id)->first();
    $data->id_user = $request->input('id_user');
    $data->id_produk = $request->input('id_produk');
    $data->nama_pemesan = $request->input('nama_pemesan');
    $data->alamat = $request->input('alamat');
    $data->no_hp = $request->input('no_hp');
    $data->jumlah = $request->input('jumlah');
    $data->total_harga = $request->input('total_harga');
    $data->save();
    Alert::success('validasi sukses');
    return redirect('/');
}


public function deleteData($id){
    $data = DataPesanan::where('id', $id)->first();
    $data->delete();
    Alert::success('validasi sukses');
    return redirect()->back();
}

}

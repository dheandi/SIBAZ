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
    return view('admin.pemesanan')->with('data', $data);
}

public function createData(Request $request) 
{
    $validator = Validator::make($request->all(), [ 
        'id_user' => 'required',
        'id_produk' => 'required',
        'nama_pemesan' => 'required',
        'jumlah' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'total_harga' => 'required',
    ], [
        'id_user.required' => 'Form produk tidak boleh kosong',
        'id_produk.required' => 'Form deskripsi tidak boleh kosong',
        'nama_pemesan' => 'wajib ',
        'jumlah' => 'wajib ',
        'alamat' => 'Wajib',
        'no_hp' => 'Wajib',
        'total_harga' => 'wajib ',
    ]);

    if ($validator->fails()) { 
        $message = $validator->errors()->all();
        Alert::error('Gagal', $message);
        return redirect()->back();
    }

    $data = new DataPesanan();
    $data->id_user = $request->input('id_user');
    $data->id_produk = $request->input('id_produk');
    $data->nama_pemesan = $request->input('nama_pemesan');
    $data->alamat = $request->input('alamat');
    $data->no_hp = $request->input('no_hp');
    $data->jumlah = $request->input('jumlah');
    $data->total_harga = $request->input('total_harga');

    $data->save();

    if ($data) {
        Alert::success('Tambah data produk sukses');
        return back();
    } else {
        Alert::error('Gagal tambah produk');
        return back();
    }
}

// public function EditDataById($id){
//     $data = PesananModel::where('id', $id)->first();
//     return view('admin.pemesanan')->with('data', $data);
// }
// public function UpdateData(request $request,$id){
//     $validation = Validator::make($request->all(),
//     [
//         'id_user' => 'required',
//         'id_produk' => 'required',
//         'nama_pemesan' => 'required',
//         'jumlah' => 'required',
//         'total_harga' => 'required',            
//     ],
//     [
//         'id_user.required' => 'Form produk tidak boleh kosong',
//         'id_produk.required' => 'Form deskripsi tidak boleh kosong',
//         'nama_pemesan' => 'wajib ',
//         'jumlah' => 'wajib ',
//         'total_harga' => 'wajib ',
//     ]);
//     if($validation->fails()){
//         $errors = $validation->errors()->first();
//         Alert::error('validasi gagal', $errors);
//         return redirect()->back();
//     }
//     $data = PesananModel::where('id', $id)->first();
//     $data->id_user = $request->input('id_user');
//     $data->id_produk = $request->input('id_produk');
//     $data->nama_pemesan = $request->input('nama_pemesan');
//     $data->jumlah = $request->input('jumlah');
//     $data->total_harga = $request->input('total_harga');
//     $data->save();
//     Alert::success('validasi sukses');
//     return redirect('/');
// }


public function deleteData($id){
    $data = DataPesanan::where('id', $id)->first();
    $data->delete();
    Alert::success('validasi sukses');
    return redirect()->back();
}
}

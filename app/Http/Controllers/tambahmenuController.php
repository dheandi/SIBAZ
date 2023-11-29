<?php

namespace App\Http\Controllers;

use App\Models\tambahmenuModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

class tambahmenuController extends Controller
{
    public function getAllDataMenu3() {
        try {
            $data = tambahmenuModels::all();
            \Illuminate\Support\Facades\Log::info('Data retrieved successfully: ' . json_encode($data));
    
            return view('admin.tambahMenu', compact('data'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error retrieving data: ' . $e->getMessage());
            return response()->view('errors.custom', [], 500);
        }
    }
    
    public function tambahdatamenu3(Request $request)
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
            
            if (!is_dir('uploads/datamenu/')) {
                mkdir('uploads/datamenu/', 0755, true);
            }

            try {
                $file->move('uploads/datamenu/', $filename);
                $data->gambar = $filename;
            } catch (\Exception $e) {
                Alert::error('Gagal', 'Gagal mengunggah gambar. Error: ' . $e->getMessage());
                return redirect()->back();
            }

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

    public function editdatamenu3($id)
    {
        try {
            $data = tambahmenuModels::findOrFail($id);
    
            return view('admin.editMenu', compact('data'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error retrieving data for edit: ' . $e->getMessage());
            return response()->view('errors.500', [], 500);
        }
    }
    

public function updatedatamenu3(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama_menu' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
    ], [
        'nama_menu.required' => 'Nama Anggota wajib diisi',
        'deskripsi' => 'deskripsi wajib diisi ',
        'harga' => 'harga wajib diisi',
    ]);

    if ($validator->fails()) {
        $message = $validator->errors()->all();
        Alert::error('Gagal', $message);
        return redirect()->back();
    }

    try {
        $data = tambahmenuModels::find($id);

        if (!$data) {
            Alert::error('Data tidak ditemukan');
            return redirect()->back();
        }

        $data->nama_menu = $request->input('nama_menu');
        $data->deskripsi = $request->input('deskripsi');
        $data->harga = $request->input('harga');

        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            
            if (!is_dir('uploads/datamenu/')) {
                mkdir('uploads/datamenu/', 0755, true);
            }

            $file->move('uploads/datamenu/', $filename);
            $data->gambar = $filename;
        }

        $data->save();

        Alert::error('Gagal update data');
        return redirect()->route('getAllDataMenu3');
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Error updating data: ' . $e->getMessage());
        Alert::success('Update data sukses');
        return redirect()->back();
    }
}

// public function hapusdatamenu3($id)
// {
//     $data = tambahmenuModels::where('id', $id)->first();
//     $data->delete();
//     Alert::success('Hapus data sukses');
//     return redirect()->back();
// }

public function hapusdatamenu3($id)
{
    $data = tambahmenuModels::where('id', $id)->first();

    // Menampilkan konfirmasi menggunakan SweetAlert
    return $this->confirmDelete($data);
}

private function confirmDelete($data)
{
    return view('konfirmasi-hapus', compact('data'));
}

}




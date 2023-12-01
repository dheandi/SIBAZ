@extends('layouts.master')

@section('title')
    DASHBOARD ADMIN | Bazar
@endsection

@section('content')

<div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pesanan</h4>
                            </div>

                            <!-- Button trigger modal -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('tambahdata') }}" enctype="multipart/form-data">
                            @csrf
                            <div id="error-message" class="alert alert-danger mt-3" style="display: none;">
                                    <strong>Peringatan!</strong> Mohon lengkapi semua kolom yang diperlukan sebelum menyimpan data.
                                </div>
                            <div class="form-group">
                                <label for="id_user">Nama Penangung Jawab</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="id_produk">Menu</label>
                                <input type="text" class="form-control" id="id_produk" name="id_produk" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="nama_pemesan">Nama Pemesan</label>
                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total</label>
                                <input type="text" class="form-control" id="total_harga" name="total_harga" autocomplete="off">
                            </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="return validateForm()">Simpan</button>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama PJ</th>
                                                <th>Menu</th>
                                                <th>Nama Pemesan</th>
                                                <th>Alamat</th>
                                                <th>No HP Pemesan</th>
                                                <th>Jumlah</th>
                                                <th>Total harga</th>
                                                <th>Tanggal Pesanan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1;
                                                            @endphp

                                                            @foreach ($data as $d)
                                                                <tr class="odd">
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>{{ $d->id_user }}</td>
                                                                    <td>{{ $d->id_produk }}</td>
                                                                    <td>{{ $d->nama_pemesan }}</td>
                                                                    <td>{{ $d->alamat }}</td>
                                                                    <td>{{ $d->no_hp }}</td>
                                                                    <td>{{ $d->jumlah }}</td>
                                                                    <td>{{ $d->total_harga }}</td>
                                                                    <td>{{ $d->created_at }}</td>
                                                                    <td>
                                                                        
                                                                        <form action="{{ route('hapus', $d->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger"><i
                                                                                    class="fa fa-trash-o fa-fw"
                                                                                    aria-hidden="true"></i></button>

                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
@endsection
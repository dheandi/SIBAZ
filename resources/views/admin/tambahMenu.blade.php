@extends('layouts.master')

@section('title')
    TAMBAH MENU | Bazar
@endsection

@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <button type="button" class="badge badge-xl bg-gradient-info border-0" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><i class="fa fa-plus" aria-hidden="true"></i>
                                Tambah Data
                            </button>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2 mt-2">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Menu</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    @if (count($data) > 0)
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($data as $d)
                                                <tr class="odd">
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $d->nama_menu }}</td>
                                                    <td>{{ $d->deskripsi }}</td>
                                                    <td>{{ $d->harga }}</td>
                                                    <td>
                                                        <img src="/uploads/datamenu/{{ $d->gambar }}" width="50px"
                                                            height="50px">
                                                    </td>

                                                    <td>
                                                        <form action="{{ route('updatedatamenu', $d->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $d->id }}">
                                                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('hapusdatamenu', $d->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @else
                                        <tfoot>
                                            <tr>
                                                <td colspan="9" class="text-center">Data Not found</td>
                                            </tr>
                                        </tfoot>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data menu</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('tambahdatamenu') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_menu">Nama menu</label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_menu">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="modal fade edit-modal" id="editModal{{ $d->id }}" aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data menu</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Edit Data -->
                        <form method="POST" action="{{ route('updatedatamenu', $d->id) }}" enctype="multipart/form-data">
                            @csrf
                            <!-- @method('POST') -->
                            <div class="form-group">
                                <label for="edit_nama_menu{{ $d->id }}">Nama menu</label>
                                <input type="text" class="form-control" id="edit_nama_menu{{ $d->id }}" name="nama_menu" value="{{ $d->nama_menu }}">
                            </div>
                            <div class="form-group">
                                <label for="edit_deskripsi{{ $d->id }}">Deskripsi</label>
                                <textarea class="form-control" id="edit_deskripsi{{ $d->id }}" name="deskripsi">{{ $d->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="edit_harga{{ $d->id }}">Harga</label>
                                <input type="text" class="form-control" id="edit_harga{{ $d->id }}" name="harga" value="{{ $d->harga }}">
                            </div>
                            <div class="form-group">
                                <label for="edit_gambar{{ $d->id }}">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="edit_gambar{{ $d->id }}">
                                        <label class="custom-file-label" for="edit_gambar{{ $d->id }}">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('sweetalert::alert')
@endsection
<script>
     $(document).ready(function () {
        $('.edit-modal').on('hidden.bs.modal', function (e) {
            console.log('Modal hidden event triggered.');
            $(this).find('form')[0].reset();
        });
    });
</script>



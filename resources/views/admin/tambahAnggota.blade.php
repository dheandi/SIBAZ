@extends('layouts.master')

@section('title')
    TAMBAH ANGGOTA | Bazar
@endsection

@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-2">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder text-white mb-0">Tambah Anggota</h6>
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
                            <button type="submit" class="badge badge-xl bg-gradient-success border-0 ms-auto "><i
                                    class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
                            </button>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2 mt-2">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anggota Pena</th>
                                            <th>Username</th>
                                            <th>Password</th>
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
                                                    <td>{{ $d->namaAnggota }}</td>
                                                    <td>{{ $d->username }}</td>
                                                    <td>{{ $d->password }}</td>

                                                    <td>

                                                        <form action="{{ route('hapusdataanggota', $d->id) }}"
                                                            method="POST">
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
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 10000">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('tambahdataanggota') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="namaAnggota">Nama Penangung Jawab</label>
                                <input type="text" class="form-control" id="namaAnggota" name="namaAnggota">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
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
        </div>

        </div>
    </main>
    @include('sweetalert::alert')
@endsection

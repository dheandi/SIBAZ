@extends('layouts.master')

@section('title')
    DATA PESANAN | Bazar
@endsection

@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder text-white mb-0">Tambah Pesanan</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <button type="submit" class="badge badge-xl bg-gradient-info border-0 "><i class="fa fa-plus"
                                    aria-hidden="true"></i> Tambah data
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
                                            <th class="col-3">Nama PJ</th>
                                            <th class="col-3">Pesanan</th>
                                            <th>Nama Pemesan</th>
                                            <th class="col-3">Alamat</th>
                                            <th>No HP</th>
                                            <th>Jumlah</th>
                                            <th>Total harga</th>
                                            <th class="col-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>andi</td>
                                            <td>Pisang Coklat</td>
                                            <td>Bejo</td>
                                            <td>Palu</td>
                                            <td>09336725843</td>
                                            <td>3</td>
                                            <td>30000</td>
                                            <td>
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2 </td>
                                            <td>Dhe</td>
                                            <td>Pisang Coklat</td>
                                            <td>Tejo</td>
                                            <td>Palu</td>
                                            <td>09336725843</td>
                                            <td>5</td>
                                            <td>50000</td>
                                            <td>
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </td>
                                        </tr>
                                    </tbody>

                                    {{-- <table class="table table-bordered justify-center mt-3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama PJ</th>
                                            <th>Pesanan</th>
                                            <th>Nama Pemesan</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Jumlah</th>
                                            <th>Total harga</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr>
                                            <td>1. </td>
                                            <td>andi</td>
                                            <td>Pisang Coklat</td>
                                            <td>Bejo</td>
                                            <td>Tondo, Roviga</td>
                                            <td>09336725843</td>
                                            <td>3</td>
                                            <td>30000</td>
                                            <td>Hapus</td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

@extends('layouts.master')

@section('title')
    DASHBOARD ADMIN | Bazar
@endsection

@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Semua Pesanan</p>
                                        <h5 class="font-weight-bolder">
                                            100+
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pesanan Makanan</p>
                                        <h5 class="font-weight-bolder">
                                            80 makanan
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pesanan Minuman</p>
                                        <h5 class="font-weight-bolder">
                                            30 Pesanan
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Tabel Pesanan</h6>
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
                                            <th>Tanggal Pemesanan</th>
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
                                                    <td>{{ $d->id_user }}</td>
                                                    <td>{{ $d->id_produk }}</td>
                                                    <td>{{ $d->nama_pemesan }}</td>
                                                    <td>{{ $d->alamat }}</td>
                                                    <td>{{ $d->no_hp }}</td>
                                                    <td>{{ $d->jumlah }}</td>
                                                    <td>{{ $d->total_harga }}</td>
                                                    <td>{{ $d->created_at }}</td>
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

    </main>
@endsection

@extends('layouts.pegawai')
@section('contents')
<div class="row ">
    <div class="col-12 grid-margin stretch-card">
      <div class="card corona-gradient-card">
        <div class="card-body py-0 px-0 px-sm-3">
          <div class="row align-items-center">
            <div class="col-4 col-sm-3 col-xl-2">
              <img src="dashmin/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
            </div>
            <div class="col-5 col-sm-7 col-xl-8 p-0">
              <h4 class="mb-1 mb-sm-0">Selamat datang di Data Lowongan,  <b style="color: yellow">{{ Auth::user()->name }} </b>! </h4>
              <p class="mb-0 font-weight-normal d-none d-sm-block">Di sini Anda dapat menambahkan dan mengupdate Lowongan yang tersedia!</p>
            </div>
            <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
              <span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Lowongan</h4>
            <div class="search-container mb-5">
                <form action="/datalowongan" method="GET">
                    <input type="text" name="search" class="search-input" placeholder="">
                </form>
                <i class="mdi mdi-magnify search-icon"></i>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-fluid" id="lowonganContainer">
                <div class="row mb-3 align-items-center">
                    <div class="col-auto ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 11px">
                                <i class="mdi mdi-calendar-clock "></i> STATUS LOWONGAN
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                              <h6 class="dropdown-header">STATUS LOWONGAN</h6>
                              <a class="dropdown-item" href="{{ route('datalowonganpekerjaan') }}">Semua</a>
                              <a class="dropdown-item" href="{{ route('datalowonganpekerjaan', ['status' => 'aktif']) }}">Aktif</a>
                              <a class="dropdown-item" href="{{ route('datalowonganpekerjaan', ['status' => 'kadaluwarsa']) }}">Kadaluwarsa</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="/tambahlowonganpeg" class="btn btn-outline-primary btn-fw d-flex align-items-center" style="font-size: 11px">
                            <i class="mdi mdi-plus"></i>LOWONGAN
                        </a>
                    </div>
                </div>
            </div>    
                      <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Pekerjaan Tersedia </th>
                                    <th> Nama Perusahaan </th>
                                    <th> Kategori Jurusan </th>
                                    <th> Tanggal Dimulai </th>
                                    <th> Tanggal Berakhir </th>
                                    <th> Batas Pelamar </th>
                                    <th> Opsi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lowongan as $l)
                                <tr class="lowongan" data-tanggalDimulai="{{ $l->tanggal_dimulai }}" data-tanggalBerakhir="{{ $l->tanggal_berakhir }}">
                                  <td style="color: #A9A9A9"> {{ $loop->iteration }} </td>
                                  <td style="color: #A9A9A9"> {{ $l->name }} </td>
                                  <td style="color: #A9A9A9"> {{ $l->perusahaan->nama }} </td>
                                  <td style="color: #A9A9A9"> {{  implode(',',json_decode($l->kategori_jurusan))  }} </td>
                                  <td style="color: #A9A9A9"> {{ $l->tanggal_dimulai }} </td>
                                  <td style="color: #A9A9A9"> {{ $l->tanggal_berakhir }} </td>
                                  <td style="color: #A9A9A9"> {{ $l->batas_pelamar }} </td>
                                    <td>
                                        <a class="btn btn-outline-warning" style="font-size: 10px; margin-right: 10px;" href="{{ route('detailtahapan', ['id_lowongan' => $l->id]) }}"><i class="mdi mdi-buffer"></i>TAHAPAN</a>
                                        <a class="btn btn-outline-info" style="font-size: 10px; margin-right: 10px;" href="/editlowongan/{{ $l->id }}"><i class="mdi mdi-square-edit-outline"></i>EDIT</a>
                                        <a class="btn btn-outline-danger" style="font-size: 10px; margin-right: 10px;" href="/deletelowongan/{{ $l->id }}" onclick="return confirm ('Anda yakin akan menghapus data ini?')"><i class="mdi mdi-delete-empty"></i>HAPUS</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>

@endsection
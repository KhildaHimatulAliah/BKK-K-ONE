@extends('layouts.superadmin')
@section('contents')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card corona-gradient-card">
        <div class="card-body py-0 px-0 px-sm-3">
          <div class="row align-items-center">
            <div class="col-4 col-sm-3 col-xl-2">
              <img src="dashmin/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
            </div>
            <div class="col-5 col-sm-7 col-xl-8 p-0">
              <h4 class="mb-1 mb-sm-0">Selamat datang di Manajemen Kandidat,  <b style="color: yellow">{{ Auth::user()->name }} </b>  </h4>
              <p class="mb-0 font-weight-normal d-none d-sm-block">Cek berkas dan status kandidat disini! Dan jangan lupa untuk selalu mengupdate status setiap kandidat ya!</p>
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
<h4 class="card-title">LIST LOWONGAN KERJA</h4>
<div class="container-xxl">
  <div class="search-container m-3">
    <form action="/manajemenkandidat" method="GET">
      <input type="text" name="search" class="search-input" placeholder="">
    </form>
    <i class="mdi mdi-magnify search-icon"></i>

  </div>
  
  <div class="row">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th> No </th>
            <th>  </th>
            <th> Perusahaan </th>
            <th> Posisi </th>
            <th> Batas Pelamar </th> 
            <th> Jumlah Pelamar Saat ini </th> 
            <th> Opsi </th> 
          </tr>
        </thead>
        @foreach ($lowongan as $l)
        <tbody>
          <tr >
            <th style="color: #A9A9A9" scope="row">{{ $loop->iteration }}</th>
            <td style="color: white">
              {{-- <img src="{{('storage/page/artikel/'.$artikel->foto) }}" alt="" style="border-radius: 0px; width: 200px; height:100px;"/> --}}
            <td style="color: white">{{ $l->perusahaan->nama }}</td>
            <td style="color: white">{{ $l->name }}</td>
            <td style="color: white">{{ $l->batas_pelamar }}</td>
            <td style="color: white">{{ $l->pengajuan->count() }}</td>
            <td style="color: white">
              <a href="detailkandidat/{{ $l->id }}" class="btn btn-outline-info" style="font-size: 10px"><i class="mdi mdi-account-details"></i>DETAIL KANDIDAT</a>
            </td>
          </tr>
          @endforeach
        </tbody>
        {{ $lowongan->links() }}
      </table>
    </div>
      
</div>
</div>
</p>
</div>
</div>
@endsection
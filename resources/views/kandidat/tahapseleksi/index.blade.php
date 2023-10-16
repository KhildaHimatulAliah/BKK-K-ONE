@extends('layouts.user')
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
            <h4 class="mb-1 mb-sm-0">Semangat <b style="color: yellow">{{ Auth::user()->name }}</b> ! </h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">Jangan pernah ragu pada potensi Anda sendiri. Mulai daftarkan dirimu disini ya!</p>
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
<div class="col-lg-15 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="search-container mb-5">
          <form action="/datalowongan" method="GET">
            <input type="text" name="search" class="search-input" placeholder="">
          </form>
          <i class="mdi mdi-magnify search-icon"></i>
        </div>
        <div class="container-fluid">
        </div>
        @foreach ($pengajuan as $item)
      <div class="card-body m-3 " style="background: none; border: 1px solid white; border-radius: 5px;">
        <div class="row g-4">
            <div class="col-md-8 d-flex align-items-center" >
                <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/logoperusahaan/'.$item->lowongan->perusahaan->logo) }}" alt="" style="width: 80px; height: 60px; margin: 3px;">
                <div class="text-start ps-4">
                    <h5 class="mb-1">{{ $item->lowongan->name }}</h5>
                    <h6 class="text-truncate me-3">{{ $item->lowongan->perusahaan->nama }}</h6>
                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->lowongan->perusahaan->alamat }}</span>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
              <div class="d-flex">
                <a class="btn btn-outline-info" style="font-size: 10px; margin-right: 10px;" href="tahapan/{{ $item->lowongan->id }}"><i class="mdi mdi-buffer"></i><b>TAHAPAN</b></a>
              
              </div>
            </div>
          </div>
      </div>
      @endforeach
        </div>
      </div>
    </div>
<script src="dashmin/js/todolist.js"></script>
@endsection
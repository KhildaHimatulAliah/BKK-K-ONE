@extends('layouts.superadmin')
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
            <h4 class="mb-1 mb-sm-0">Selamat datang di Data Perusahaan,  <b style="color: yellow">{{ Auth::user()->name }} </b>! </h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">Di sini Anda dapat mengelola informasi penting tentang perusahaan yang bekerja sama dengan kita!</p>
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
<div class="col-md-15 grid-margin stretch-card">
  <div class="card">
  <div class="card-body">
      <h4 class="card-title">Data Perusahaan</h4>
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      <div class="mb-3 mt-3 d-flex justify-content-end px-3">
        <a href="tambahperusahaan" class="btn btn-outline-primary btn-fw me-2" style="font-size: 11px"><i class="mdi mdi-plus"></i>PERUSAHAAN</a>
        <a href="/unduhdataperusahaan" class="mdi mdi-file-excel btn btn-outline-success mx-1" style="font-size: 10px;">
          EKSPORT</a>
      </div>
      </p>

 <div class="table-responsive">
  <table class="table table-striped">                  
    <thead>
      <tr>
        <th> No </th>
        <th> Nama Perusahaan </th>
        <th> Alamat </th>
        <th> Opsi </th> 
      </tr>
    </thead>
    @foreach ($perusahaans as $perusahaan )
    <tbody>
      <tr>
        <th style="color: #A9A9A9" scope="row"> {{ $loop->iteration }} </th>
        <td>
          <img src="{{ ('storage/logoperusahaan/'. $perusahaan->logo) }}" alt="image" />
          <span class="ps-2" style="color: #A9A9A9; ">{{ $perusahaan->nama }}</span>
        </td>
        <td style="color: #A9A9A9; white-space: normal;"> {{ $perusahaan->alamat }} </td>
        <td style="color: #A9A9A9">
          <a href="/updateperusahaan/{{ $perusahaan->id }}" class="btn btn-outline-info"  style="font-size: 10px;"><i class="mdi mdi-square-edit-outline"></i>EDIT</a>
          <a class="btn btn-outline-danger" style="font-size: 10px;" href="/deleteperusahaan/{{ $perusahaan->id }}" onclick="return confirm ('Anda yakin akan menghapus data ini?')"><i class="mdi mdi-delete-empty"></i>HAPUS</a></td>
      </tr>
     
    </tbody>
   @endforeach
   
  </table>
</div>
</div>
</div>
</div>
          
        

  @endsection
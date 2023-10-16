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
            <h4 class="mb-1 mb-sm-0">Selamat datang di Pusat Keamanan,  <b style="color: yellow">{{ Auth::user()->name }} </b>! </h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">Di sini, Anda memiliki kendali penuh atas data login pengguna.</p>
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
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Akun Pegawai</h4>
          <div class="search-container mb-5">
            <form action="/akunpegawai" method="GET">
              <input type="text" name="search" class="search-input" placeholder="">
            </form>
            <i class="mdi mdi-magnify search-icon"></i>
          </div>

          <div class="mb-3 mt-3 d-flex justify-content-end px-3">
            <a href="/unduhdatapegawai" class="btn btn-outline-success mx-1" style="font-size: 11px"><i class="mdi mdi-file-excel"></i>EKSPORT</a>
            <a href="/tambahpegawai" class="btn btn-outline-primary mx-1" style="font-size: 10px;"><i class="mdi mdi-plus"></i>
              PEGAWAI</a>
          </div>
          
          {{-- <div class="mb-3 mt-3 d-flex justify-content-end px-3">
            <div class="mb-3 mt-3 d-flex justify-content-end px-3">
              <a href="/unduhdatapegawai" class="mdi mdi-file-excel btn btn-outline-success mx-1" style="font-size: 10px;">
                EKSPORT</a>
            </div>
            <div class="mb-3 mt-3 d-flex justify-content-end px-3">
              <a href="/tambahpegawai" class="mdi mdi-plus btn btn-outline-primary mx-1" style="font-size: 10px;">
                PEGAWAI</a>
            </div>
          </div> --}}
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                      </label>
                    </div>
                  </th>
                  <th> No </th>
                  <th> Name </th>
                  <th> Username </th>
                  <th> Email </th>
                  <th> Jenis Kelamin </th>
                  <th> Opsi </th>
                </tr>
              </thead>
              @foreach ($pegawai as  $index => $pegawai)
              <tbody>
                <tr>
                  <td>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td>{{ $index + 1 }}</td>
                  <td>
                    <img src="{{ asset('storage/foto/' . ($pegawai->foto ? $pegawai->foto : 'default2.jpg')) }}" alt="image" />
                    <span class="ps-2">{{ $pegawai->name }}</span>
                  </td>
                  <td> {{ $pegawai->username }} </td>
                  <td> {{ $pegawai->email }} </td>
                  <td> {{ $pegawai->jenis_kelamin }} </td>
                  <td>
                    <a href="/repaspegawai/{{ $pegawai->id }}" class="mdioutline btn btn-outline-info" style="font-size: 10px;"><i class="mdi mdi-account-key"></i>PASSWORD</a>
                    <a class="btn btn-outline-danger" style="font-size: 10px;" href="/deletepegawai/{{ $pegawai->id }}" onclick="return confirm ('Anda yakin akan menghapus data ini?')"><i class="mdi mdi-delete-empty"></i>HAPUS</a>
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

  @endsection
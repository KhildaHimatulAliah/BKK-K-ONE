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
            <h4 class="mb-1 mb-sm-0">Selamat datang di Pusat Keamanan, <b style="color: yellow">{{ Auth::user()->name }}</b> ! </h4>
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
          <h4 class="card-title">Akun Kandidat</h4>
          {{-- search --}}
          <div class="search-container mb-5">
            <form action="/akunkandidat" method="GET">
              <input type="text" name="search" class="search-input" placeholder="">
            </form>
            <i class="mdi mdi-magnify search-icon"></i>
          </div>
          <div class="table-responsive">
            <div class="mb-3 mt-3 d-flex justify-content-end px-3">
              <a href="/unduhdatakandidat" class="mdi mdi-file-excel btn btn-outline-success mx-1" style="font-size: 10px;">
                EKSPORT</a>
            </div>
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
              @foreach ($kandidat as  $index => $kandidat)
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
                    <img src="{{ asset('storage/foto/' . ($kandidat->foto ? $kandidat->foto : 'default2.jpg')) }}" alt="image" />
                    <span class="ps-2">{{ $kandidat->name }}</span>
                </td>                
                  <td> {{ $kandidat->username }} </td>
                  <td> {{ $kandidat->email }} </td>
                  <td> {{ $kandidat->jenis_kelamin }} </td>
                  <td>
                    <a href="/repaskandidat/{{ $kandidat->id }}" class="btn btn-outline-info" style="font-size: 10px;"><i class="mdi mdi-account-key-outline"></i>PASSWORD</a>
                    <a class="btn btn-outline-danger" style="font-size: 10px;" href="/deletekandidat/{{ $kandidat->id }}" onclick="return confirm ('Anda yakin akan menghapus data ini?')"><i class="mdi mdi-delete-empty"></i>HAPUS</a>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table> 
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
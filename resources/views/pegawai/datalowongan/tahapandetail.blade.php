@extends('layouts.pegawai')
@section('contents')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card corona-gradient-card">
        <div class="card-body py-0 px-0 px-sm-3">
          <div class="row align-items-center">
            <div class="row align-items-center">
              <div class="d-flex align-items-center">
                <img src="dashmin/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                <div class="ml-3">
                  <div class="ml-3">
                    <div class="mb-0 font-weight-normal d-sm-none">
                      <h4>Hallo,Selamat datang <b style="color: yellow">{{ Auth::user()->name }}</b>!</h4>
                    </div>
                  </div>                                  
                </div>
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
          <h4 class="card-title">Tahapan</h4>
          <a class="btn btn-outline-primary" style="font-size: 10px; margin-right: 10px;" href="{{ route('tahapan-pegawai', ['id_lowongan' => request()->id_lowongan]) }}"><i class="mdi mdi-buffer"></i>TAMBAH TAHAPAN</a>
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  {{-- <th> ID </th> --}}
                  <th> No </th>
                  <th> Tahapan </th>
                  <th> Opsi </th>
                </tr>
              </thead>
           @foreach ($tahapan as $t)
           <tbody>
            <tr>
              <td style="color: #A9A9A9; white-space: normal;"> {{ $loop->iteration }}  </td>
              <td style="color: #A9A9A9; white-space: normal;"> {{ $t->name }} </td>
              <td>
                <a href="#" class="mdi mdi-delete-empty btn btn-outline-danger" style="font-size: 10px;">HAPUS</a>
              </td>
            </tr>
          </tbody>
           @endforeach
              
            </table>
          </div>
        </div>
      </div>
</div>
@endsection
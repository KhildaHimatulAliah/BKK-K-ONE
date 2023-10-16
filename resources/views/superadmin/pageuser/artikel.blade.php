@extends('layouts.superadmin')
@section('contents')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card corona-gradient-card">
      <div class="card-body py-0 px-0 px-sm-3">
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
        <h4 class="card-title">Page Artikel</h4>
        <div class="search-container">
          <form action="artikel" method="GET">
          <input type="text" name="search" class="search-input" placeholder="">
        </form>
          <i class="mdi mdi-magnify search-icon"></i>
        </div>
        <div class="container-fluid">
          <div class="d-flex justify-content-end">
            <a href="/tambahartikel" class="btn btn-outline-primary" style="font-size: 10px">
              <i class="mdi mdi-plus"></i> ARTIKEL
          </a>
          </div>
        </div>
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> No </th>
                <th> Foto </th>
                <th> Judul </th>
                <th> Deskripsi </th>
                <th> Waktu </th> 
                <th> Opsi </th> 
              </tr>
            </thead>
            @foreach ($artikel as $item)
            <tbody>
              <tr>
                <th style="color: #A9A9A9" scope="row">{{ $loop->iteration }}</th>
                <td>
                  <img src="{{('storage/page/artikel/'.$item->foto) }}" alt="" style="border-radius: 0px; width: 200px; height:100px;"/>
                </td>
                
                <td style="color: #A9A9A9"> {{ $item->judul }} </td>
                <td style="color: #A9A9A9; white-space: normal;"> {!! $item->deskripsi !!} </td>
                <td style="color: #A9A9A9"> {{ $item->created_at }} </td>
                <td>
                  <a href="/updateartikel/{{$item->id }}" class="btn btn-outline-info"  style="font-size: 10px;"><i class="mdi mdi-square-edit-outline"></i>EDIT</a>
                  <a class="btn btn-outline-danger" style="font-size: 10px;" href="/ArtikelDelete/{{ $item->id }}" onclick="return confirm ('Anda yakin akan menghapus data ini?')"><i class="mdi mdi-delete-empty"></i>HAPUS</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $artikel->links() }}
      </div>
    </div>
  </div> 


  
@endsection

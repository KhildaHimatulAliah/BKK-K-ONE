@extends('layouts.superadmin')
@section('contents')
        <!-- partial -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{ asset('dashmin/images/dashboard/Group126@2x.png') }}" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-2 col-sm-7 col-xl-8 p-0">
                        <h4 >Selamat datang di Pusat Keamanan, <b style="color: yellow">{{ Auth::user()->name }}</b></h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Anda dapat mengelola data NIS dan melakukan pendaftaran dengan menambahkan data NIS baru.</p>
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
            <div class="row">
              <div class="col-md-15 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data NIS Terdaftar</h4>
                   
                    <div class="search-container mb-5">
                      <form action="/nis" method="GET">
                        <input type="text" name="search" class="search-input" placeholder="">
                      </form>
                      <i class="mdi mdi-magnify search-icon"></i>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div>
                  @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="container-fluid">
                      <div class="d-flex justify-content-end">
                        <a href="/tambahnis" class="mdi mdi-plus btn btn-outline-primary m-1" style="font-size: 10px;">
                         NIS
                      </a>
                        <a href="/unduhdatanis" class="btn btn-outline-success m-1" style="font-size: 10px;"><i class="mdi mdi-file-excel"></i>
                         EKSPORT
                      </a>
                      <button type="button" class="btn btn-outline-success m-1" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 10px;"><i class="mdi mdi-file-excel"></i>
                        IMPORT
                      </button>
                       <a href="{{ route('importtemplateexcelnis', ['filename' => 'templateimport.xlsx']) }}" class="btn btn-outline-success m-1" style="font-size: 10px;" data-toggle="modal" data-target="#basicModal"><i class="mdi mdi-file-excel"></i>
                         TEMPLATE  
                      </a>
                      </div>
                    </div>
                    </p>
               
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="/importnis" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                            <input type="file" name="file">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
               <div class="table-responsive">
                <table class="table table-striped">                  
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Nama </th>
                      <th> NIS </th>
                      <th> Opsi </th> 
                    </tr>
                  </thead>
                  @foreach ($nis as $index => $item)
                  <tbody>
                    <tr>
                      <th style="color: #A9A9A9" scope="row">{{ $nis->firstItem() + $index}}</th>
                      <td style="color: #A9A9A9; white-space: normal;">{{ $item->nama }}</td>
                      <td style="color: #A9A9A9; white-space: normal;">{{ $item->nis }}</td>
                      <td style="color: #A9A9A9">
                        <a href="/editnis/{{ $item->id }}" class="btn btn-outline-info"  style="font-size: 10px;"><i class="mdi mdi-square-edit-outline"></i>EDIT</a>
                        <a class="btn btn-outline-danger" style="font-size: 10px;" href="" onclick="return confirm ('Anda yakin akan menghapus data ini?')"><i class="mdi mdi-delete-empty"></i>HAPUS</a>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
              <br>
              {{ $nis->links() }}
            </div>
            
            </div>
              </div>
              
            </div>
    @endsection
    @push('script')
   
    @endpush
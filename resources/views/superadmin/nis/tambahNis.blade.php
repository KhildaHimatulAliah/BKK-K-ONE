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
                        <h4 class="mb-1 mb-sm-0">Hallo <b style="color: yellow">{{ Auth::user()->name }} </b>! Ini merupakan tempat bagi anda menambahkan NIS baru !</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Di sini, Anda memiliki hak mengelola data NIS dan melakukan pendaftaran dengan menambahkan data NIS baru.</p>
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah NIS</h4>
                     @if (session('berhasil'))
                        <div class="alert alert-success">
                          {{ session('berhasil') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                          {{ session('error') }}
                        </div>
                    @endif

                    {{ session('berhasil') }}
                    
                   
                   
                    <form action="/newnis" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                          <input type="text" name="nama" class="form-control" id="nama" value="" style="color: white">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No Induk Siswa (NIS)</label>
                        <div class="col-sm-9">
                          <input type="text" name="nis" class="form-control" id="nis" value="" style="color: white">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary me-2 mdi mdi-content-save">Simpan</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

  @endsection
  
  
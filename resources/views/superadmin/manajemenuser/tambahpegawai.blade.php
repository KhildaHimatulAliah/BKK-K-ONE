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
                        <h4 class="mb-1 mb-sm-0">Hallo <b style="color: yellow">{{ Auth::user()->name }} </b>! Ini merupakan tempat bagi anda menambahkan Artikel !</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Di sini, Anda memiliki peran kunci dalam membentuk pengetahuan dan menginspirasi melalui artikel-artikel yang Anda tulis.</p>
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
                    <h4 class="card-title">Tambah Pegawai</h4>
                    <form action="/insertpegawai" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Pegawai</label>
                        <div class="col-sm-9">
                          <input type="text" name="name" class="form-control" id="name" value="" style="color: white">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                          <input type="text" name="username" class="form-control" id="username" value="" style="color: white">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" name="email" class="form-control" id="email" value="" style="color: white">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" class="form-control" id="password" value="" style="color: white">
                        </div>
                      </div>
                      <div class="form-group">
                        <input placeholder="Jenis Kelamin"  type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki">
                        <label class="" for="Laki-laki">Laki-laki</label>
                        <input class="" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan">
                        <label class="" for="Perempuan">Perempuan</label>   
                    </div>
                      <button type="submit" class="btn btn-primary me-2 mdi mdi-content-save">Simpan</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>



              <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
              <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
              <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
              <style>
                  form {
                    width:800px;
                  }
                </style>
  @endsection
  
  
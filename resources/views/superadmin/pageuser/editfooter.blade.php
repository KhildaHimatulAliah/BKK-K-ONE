@extends('layouts.superadmin')
@section('contents')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card corona-gradient-card">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="col-4 col-sm-3 col-xl-2">
            <img src="{{ asset('dashmin/images/dashboard/Group126@2x.png') }}" class="gradient-corona-img img-fluid" alt="">
          </div>
          <div class="col-5 col-sm-7 col-xl-8 p-0">
            <h4 class="mb-1 mb-sm-0">Selamat datang di Panggung Kreativitas, <b style="color: yellow">{{ Auth::user()->name }} </b>!</h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">Di sini Anda memiliki kendali penuh untuk mengubah dan memperbarui tampilan halaman utama</p>
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
                  <h4 class="card-title">Edit Footer</h4>
                  <hr>
                  <form action="/newfooter/{{ $footer->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gambar 1</label>
                        <div class="col-sm-9">
                          <input type="file" name="gambar_1" class="form-control" id="gambar_1" value="{{ $footer->gambar_1 }}" style="color: #ffffff;">
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gambar 2</label>
                        <div class="col-sm-9">
                          <input type="file" name="gambar_2" class="form-control" id="gambar_2" value="{{ $footer->gambar_2 }}" style="color: #ffffff;">
                        </div>
                      </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Judul 1</label>
                      <div class="col-sm-9">
                        <input type="text" name="judul_1" class="form-control" id="judul_1" value="{{ $footer->judul_1 }}" style="color: #ffffff;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Judul 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="judul_2" class="form-control" id="judul_2" value="{{ $footer->judul_2 }}" style="color: #ffffff;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teks 1</label>
                      <div class="col-sm-9">
                        <input type="text" name="text_1" class="form-control" id="text_1" value="{{ $footer->text_1 }}" style="color: #ffffff;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teks 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="text_2" class="form-control" id="text_2" value="{{ $footer->text_2 }}" style="color: #ffffff;">
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection


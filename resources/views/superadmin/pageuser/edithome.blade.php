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
                  <h4 class="card-title">Edit Home</h4>
                  <hr>
                  <form action="/newhome/{{ $home->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gambar</label>
                      <div class="col-sm-9">
                        <input type="file" name="gambar" class="form-control" id="gambar" value="{{ $home->gambar }}" style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teks 1</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_1" class="form-control" id="teks_1" value="{{ $home->teks_1 }}" style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Teks 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_2" class="form-control" id="teks_2" value="{{ $home->teks_2 }}" style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Teks 3</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $home->teks_3 }}" style="color: white">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection


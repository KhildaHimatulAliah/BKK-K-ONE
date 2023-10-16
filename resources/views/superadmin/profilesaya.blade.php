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
            <h4 class="mb-1 mb-sm-0">Hallo  <b style="color: yellow">{{ Auth::user()->name }} </b>! </h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">Ini merupakan Profile anda! Anda bisa mereset password anda disini!</p>
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
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              @if(auth()->user()->foto && file_exists(public_path('storage/foto/' . auth()->user()->foto)))
              <img src="{{ asset('storage/foto/'.auth()->user()->foto) }}" alt=""  class="rounded-circle" width="150">
              @else
              <img src="{{ asset('storage/foto/default2.jpg') }}" alt=""  class="rounded-circle" width="150">
              @endif
              <button type="button" class="mdi mdi-border-color" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: none; border:none; color:white;">
              </button>
                    <div class="mt-3">
                    <h4>{{ Auth::user()->name }}</h4>
                    <p class="text-secondary mb-1">{{ Auth::user()->email }} <span>- Admin</span></p>
                </div>
                </div>
                @if (session('berhasil'))
                <div class="alert alert-succes">
                  {{ session('berhasil') }}
                </div>  
                @endif
        

        <!-- Modal -->
        <form action="{{ route('simpan-gambar') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Foto</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <label for="foto">Pilih Foto</label>
                  <input type="file" class="form-control-file" id="foto" name="foto">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </form>
       
                <hr>
            <form class="forms-sample">
             
              @csrf
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputUsername2" name="name" placeholder="Username" style="color: black; background-color: grey;" disabled value="{{ Auth::user()->username }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Email" style="color: black; background-color: grey;" disabled value="{{ Auth::user()->email }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputEmail2" name="jenis_kelamin" style="color: black; background-color: grey;" disabled value="{{ Auth::user()->jenis_kelamin }}">

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                    <div class="mt-3" >
                        <span class="mdi mdi-lock-reset" style="font-size: 110px"></span>
                    <h4>RESET PASSWORD</h4>
                    <hr>
                    <form class="forms-sample" action="/resetpassword" method="post" class="row g-3 needs-validation" novalidate>
                      @csrf
                      @if (session('berhasil'))
                      <div class="alert alert-success" role="alert">
                          {{ session('berhasil') }}
                      </div>
                      @endif
                        <div class="form-group row">
                          <div class="col-sm-20">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="background-color: grey;">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                        <button class="btn btn-outline-info mdi mdi-content-save" type="submit">Simpan</button>
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                        </div>
                        
                      </form>
                </div>
        </div>
      </div>
    </div>
  </div>

@endsection

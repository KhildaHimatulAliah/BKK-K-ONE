@extends('layouts.pegawai')
@section('contents')

  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="{{ asset('storage/foto/'.auth()->user()->foto) }}" alt="Admin" class="rounded-circle" width="150">
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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="color: white;">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                        <button class="btn btn-dark mdi mdi-content-save" type="submit">Simpan</button>
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

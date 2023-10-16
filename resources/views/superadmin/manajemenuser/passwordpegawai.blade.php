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
            <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>
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
<div class="col-md-6 grid-margin stretch-card">
  </div>
  <div class="row">
    <div class="col-md- grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                    <h4>{{ $pegawai->name }}</h4>
                    <p class="text-secondary mb-1">{{ $pegawai->email }} <span>- Admin</span></p>
                    <hr>
                </div>
                </div>
                <div class="d-flex flex-column align-items-center text-center">
                    <div class="mt-3" >
                    <form class="forms-sample" action="/passwordpegawai/{{ $pegawai->id }}" method="post" class="row g-3 needs-validation" novalidate>
                      @csrf
                        <div class="form-group row">
                            <input type="password" name="password" class="form-control" id="exampleInputUsername2" placeholder="New Password">
                        </div>
                        <button class="btn btn-light" type="submit">Simpan</button>
                        <button class="btn btn-dark">Cancel</button>
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                        </div>
                        
                      </form>
                </div>
        </div>
          </div>
        </div>
      </div>
  </div>
   
@endsection

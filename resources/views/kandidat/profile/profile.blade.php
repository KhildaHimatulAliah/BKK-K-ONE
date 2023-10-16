
@extends('layouts.user')
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
            <p class="mb-0 font-weight-normal d-none d-sm-block">Ini merupakan lowongan yang tersedia! Jika anda ingin menambahkan lowongan lain, silahkan tambahkan di halaman <b>Data Lowongan</b> ya!</p>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
            @if($profile)
            <a href="/edit/{{ $profile->id }}" class="btn btn-outline-light btn-rounded get-started-btn" style="background-color: rgb(255, 255, 255); color: rgb(188, 130, 202);">EDIT</a>
            <style>
              .get-started-btn:hover {
              background-color: rgb(188, 130, 202); /* Ini adalah warna ungu yang Anda sebutkan */
              color: rgb(255, 255, 255); /* Mengganti warna teks menjadi putih saat di-hover */
          }
            </style>

@else
    <p>Profil tidak ditemukan.</p>
@endif        
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body" style="min-height: 970px;">
                        <div class="d-flex flex-column align-items-center text-center">
                          @if(auth()->user()->foto && file_exists(public_path('storage/foto/' . auth()->user()->foto)))
                          <img src="{{ asset('storage/foto/'.auth()->user()->foto) }}" alt=""  class="rounded-circle" width="150">
                          @else
                          <img src="{{ asset('storage/foto/default2.jpg') }}" alt=""  class="rounded-circle" width="150">
                          @endif
                            <button type="button" class="mdi mdi-border-color" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: none; border: none; color: white; "></button>
                            @csrf
                            <form action="{{ route('simpan-gambarkandidat') }}" method="post" enctype="multipart/form-data">
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
                            <div class="mt-3">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="text-secondary mb-1"> <span>{{ Auth::user()->email }}</span></p>
                                <hr>
                              <div class="d-flex justify-content-between align-items-center mt-2">
                                <!-- Tambahkan teks ke dalam pill -->
                                <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                                    <span style="font-size: 10px">CV</span>
                                </div>                
                                <a href="{{ asset('storage/file/'.$profile->cv) }}" download>
                                  <i class="mdi mdi-cloud-download"></i>
                              </a>
                            </div>
                              <div class="d-flex justify-content-between align-items-center mt-2">
                                <!-- Tambahkan teks ke dalam pill -->
                                <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                                    <span style="font-size: 10px">Akta Kelahiran</span>
                                </div>                
                                <a href="{{ asset('storage/file/'.$profile->akta_kelahiran) }}" download>
                                  <i class="mdi mdi-cloud-download"></i>
                              </a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                              <!-- Tambahkan teks ke dalam pill -->
                              <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                                  <span style="font-size: 10px">KTP</span>
                              </div>
                              <!-- Membuat ikon menjadi tombol download -->
                              <a href="{{ asset('storage/file/'.$profile->ktp) }}" download>
                                <i class="mdi mdi-cloud-download"></i>
                            </a>
                          </div>
                          <div class="d-flex justify-content-between align-items-center mt-2">
                            <!-- Tambahkan teks ke dalam pill -->
                            <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                                <span style="font-size: 10px">Kartu Keluarga</span>
                            </div>
                            <!-- Membuat ikon menjadi tombol download -->
                            <a href="{{ asset('storage/file/'.$profile->kk) }}" download>
                              <i class="mdi mdi-cloud-download"></i>
                          </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                          <!-- Tambahkan teks ke dalam pill -->
                          <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                              <span style="font-size: 10px">Ijazah</span>
                          </div>
                          <!-- Membuat ikon menjadi tombol download -->
                          <a href="{{ asset('storage/file/'.$profile->ijazah) }}" download>
                            <i class="mdi mdi-cloud-download"></i>
                        </a>
                      </div>
                      <div class="d-flex justify-content-between align-items-center mt-2">
                        <!-- Tambahkan teks ke dalam pill -->
                        <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                            <span style="font-size: 10px">Dosis Vaksin</span>
                        </div>
                        <!-- Membuat ikon menjadi tombol download -->
                        <a href="{{ asset('storage/file/'.$profile->dosis_vaksin) }}" download>
                          <i class="mdi mdi-cloud-download"></i>
                      </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                      <!-- Tambahkan teks ke dalam pill -->
                      <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                          <span style="font-size: 10px">SKS</span>
                      </div>
                      <!-- Membuat ikon menjadi tombol download -->
                      <a href="{{ asset('storage/file/'.$profile->sks) }}" download>
                        <i class="mdi mdi-cloud-download"></i>
                    </a>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-2">
                    <!-- Tambahkan teks ke dalam pill -->
                    <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                        <span style="font-size: 10px">SKCK</span>
                    </div>               
                    <!-- Membuat ikon menjadi tombol download -->
                    <a href="{{ asset('storage/file/'.$profile->skck) }}" download>
                      <i class="mdi mdi-cloud-download"></i>
                  </a>
                </div>
                  <div class="d-flex justify-content-between align-items-center mt-2">
                    <!-- Tambahkan teks ke dalam pill -->
                    <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                        <span style="font-size: 10px">Surat AK_1</span>
                    </div>               
                    <!-- Membuat ikon menjadi tombol download -->
                    <a href="{{ asset('storage/file/'.$profile->ak_1) }}" download>
                      <i class="mdi mdi-cloud-download"></i>
                  </a>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <!-- Tambahkan teks ke dalam pill -->
                  <div class="rounded-pill bg-secondary d-flex justify-content-center align-items-center" style="width: 80%; height: 30px;">
                      <span style="font-size: 10px">Foto 3x4</span>
                  </div>   
                  <!-- Membuat ikon menjadi tombol download -->
                  <a href="{{ asset('storage/foto/'.$profile->foto) }}" download>
                      <i class="mdi mdi-cloud-download"></i>
                  </a>
              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 desktop-closer" >
              <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-11">
                          <!-- Konten lainnya (jika ada) -->
                      </div>
                      <div class="col-md-1 text-end">
                        <a href="{{ route('profile.export') }}">
                            <i class="mdi mdi-cloud-download"></i>
                        </a>
                    </div>
                  </div>
                
                      <!-- Nama Lengkap -->
                      <div class="form-group row">
                          <label for="namaLengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control bg-dark" id="namaLengkap" name="namaLengkap" value="{{ $profile->name }}" disabled>
                          </div>
                      </div>
          
                      <!-- NIK -->
                      <div class="form-group row">
                          <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control bg-dark" id="nik" name="nik" value="{{ $profile->nik }}" disabled>
                          </div>
                      </div>
          
                      <!-- Tempat Lahir -->
                      <div class="form-group row">
                          <label for="tempatLahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control bg-dark" id="tempatLahir" name="tempatLahir" value="{{ $profile->tempat_lahir }}" disabled>
                          </div>
                      </div>
          
                      <!-- Tanggal Lahir -->
                      <div class="form-group row">
                          <label for="tanggalLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                              <input type="date" class="form-control bg-dark" id="tanggalLahir" name="tanggalLahir" value="{{ $profile->tanggal_lahir }}" disabled>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="asal sekolah" class="col-sm-3 col-form-label">Asal Sekolah</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control bg-dark" id="asal_sekolah" name="asal_sekolah" value="{{ $profile->asal_sekolah }}" disabled>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="Jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control bg-dark" id="jurusan" name="jurusan" value="{{ $profile->jurusan }}" disabled>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="tanggalLahir" class="col-sm-3 col-form-label">Tinggi Badan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control bg-dark" id="tinggibadan" name="tinggibadan" value="{{ $profile->tinggi_badan }}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="asal sekolah" class="col-sm-3 col-form-label">Berat badan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control bg-dark" id="beratbadan" name="beratbadan" value="{{ $profile->berat_badan }}" disabled>
                        </div>
                    </div>
                      <!-- Dan seterusnya sesuai dengan biodata lainnya -->
          
                  </div>
              </div>
          <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                        <div class="mt-3" >
                            <span class="mdi mdi-lock-reset" style="font-size: 110px"></span>
                        <h4>RESET PASSWORD</h4>
                        <hr>
                        <form class="forms-sample" action="/resetpassword" method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                            <div class="form-group row">
                              <div class="col-sm-15">
                                <input type="password" name="password" class="form-control" id="exampleInputUsername2" placeholder="New Password">
                              @error('password')
                                <span class="invalid-feedback" role="alert"></span>
                                <strong>{{ $message }}</strong>
                              @enderror
                              </div>
                            </div>
                            <button type="submit" class="btn btn-outline-info btn-fw me-2">Reset Password</button>
                            {{-- <button class="btn btn-dark">Cancel</button> --}}
                            <div class="form-check form-check-flat form-check-primary">
                              <label class="form-check-label">
                            </div>
                            
                          </form>
                    </div>

                    <style>
                      .reset-password-card {
    margin-top: -450px; 
    height: 10px; /* Ini untuk layar desktop dan lebih besar */
}

/* Untuk mobile dengan lebar layar kurang dari 768px */
@media only screen and (max-width: 767px) {
    .reset-password-card {
        height: 50px; /* Anda bisa mengatur ke ukuran yang Anda inginkan */
    }
}


                        /* Untuk iPad Pro 10.5 inch, iPad Air (gen ke-3), iPad mini (gen ke-5), iPad (gen ke-7) */
                        @media only screen 
                          and (min-device-width: 834px) 
                          and (max-device-width: 1112px) 
                          and (-webkit-min-device-pixel-ratio: 2) {
                            .reset-password-card {
                                margin-top: -100px;
                                margin-bottom: 50px; /* Tambahkan jarak di bawah */
                            }
                        }

                    /* Untuk iPad, iPad Air 2, iPad mini 4, dan iPad Pro 9.7 inch */
                    @media only screen 
                      and (min-device-width: 768px) 
                      and (max-device-width: 1024px) {
                        .reset-password-card {
                            margin-top: -400px;
                            margin-bottom: 60px; /* Tambahkan jarak tambahan di bawah */
                        }
                    }

                  /* Untuk mobile dengan lebar layar kurang dari 768px */
                  @media only screen and (max-width: 767px) {
                      .reset-password-card {
                          margin-top: 0px;
                          margin-bottom: 40px; /* Tambahkan jarak di bawah */
                      }
                  }

</style>

                  
            </div>
          </div>
        </div>
      </div>

    <script src="dashmin/vendors/js/vendor.bundle.base.js"></script>
    <script src="dashmin/js/off-canvas.js"></script>
    <script src="dashmin/js/hoverable-collapse.js"></script>
    <script src="dashmin/js/misc.js"></script>
    <script src="dashmin/js/settings.js"></script>
    <script src="dashmin/js/todolist.js"></script>
@endsection
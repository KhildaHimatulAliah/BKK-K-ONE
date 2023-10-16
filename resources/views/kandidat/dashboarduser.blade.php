@extends('layouts.user')
@section('contents')
        <!-- partial -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{asset('dashmin/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-2 col-sm-7 col-xl-8 p-0">
                       
                        <h4 >Selamat Datang <b style="color: yellow">{{ Auth::user()->name}}</b> ! Terima kasih telah bergabung!
                        </h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Dashboard Anda adalah pintu masuk ke berbagai peluang karier. Ayo kita cari pekerjaan impian Anda bersama!</p>
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
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">List Lowongan</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          @foreach ($lowongan as $l)
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <img src="{{ ('storage/logoperusahaan/'. $l->perusahaan->logo) }}" alt="">
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <a href="datalowongan" style="text-decoration: none; color:white;" class="preview-subject">{{ $l->name }}</a>
                                <p class="text-muted mb-1 mt-1" style="font-size: 13px">{{ $l->perusahaan->nama }}</p>
                                <p class="text-muted mb-0" style="font-size: 11px">{{ $l->perusahaan->alamat }}</p>
                              </div>
                              <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">{{ $l->created_at->diffForHumans()}}</p>
                                {{-- <p class="text-muted mb-0">30 tasks, 5 issues </p> --}}
                              </div>
                            </div>
                          </div>
                          @endforeach
                        
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- partial -->
        <!-- main-panel ends -->
<script src="dashmin/vendors/js/vendor.bundle.base.js"></script>
<script src="dashmin/js/off-canvas.js"></script>
<script src="dashmin/js/hoverable-collapse.js"></script>
<script src="dashmin/js/misc.js"></script>
<script src="dashmin/js/settings.js"></script>
<script src="dashmin/js/todolist.js"></script>
    @endsection
    
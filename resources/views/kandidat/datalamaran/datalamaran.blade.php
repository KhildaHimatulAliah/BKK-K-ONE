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
            <h4 class="mb-1 mb-sm-0">Semangat <b style="color: yellow">{{ Auth::user()->name }}</b> ! </h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">Keberhasilan adalah hasil dari upaya yang tak kenal lelah. Cek status lamaranmu disini!</p>
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
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Lamaran</h4>
          {{-- search --}}
          <div class="search-container mb-5">
            <form action="/akunkandidat" method="GET">
              <input type="text" name="search" class="search-input" placeholder="">
            </form>
            <i class="mdi mdi-magnify search-icon"></i>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                      </label>
                    </div>
                  </th>
                  <th> No </th>
                  <th> Bidang Kerja </th>
                  <th> Nama Perusahaan </th>
                  <th> Tanggal </th>
                  <th> Status </th>
                </tr>
              </thead>
              @foreach ($pengajuan as $item)
              <tbody>
                <tr>
                  <td>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td> {{ $loop->iteration }} </td>
                  <td> {{ $item->lowongan->name }} </td>
                  <td> {{ $item->lowongan->perusahaan->nama }}</td>
                  <td> {{ $item->created_at }}</td>
                  <td>
                      @if ($item->status == "Menunggu")
                      <label class="btn btn-warning" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                        {{ $item->status }}
                      </label>  
                      @endif
                      @if ($item->status == "Seleksi Berkas")
                      <label class="btn btn-info" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                        {{ $item->status }}
                      </label>  
                      @endif
                      @if ($item->status == "Tes 1" || $item->status == "Tes 2" || $item->status == "Tes 3")
                      <label class="btn btn-info" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                        {{ $item->status }}
                      </label>  
                      @endif
                      @if ($item->status == "Pemanggilan")
                      <label class="btn btn-info" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                        {{ $item->status }}
                      </label>  
                      @endif
                      @if ($item->status == "Ditolak")
                      <label class="btn btn-danger" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                        {{ $item->status }}
                      </label>  
                      @endif
                      @if ($item->status == "Done")
                      <label class="btn btn-success" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                        {{ $item->status }}
                      </label>  
                      @endif
                        
                    </td>
                </tr>
              </tbody>
              @endforeach
             
            </table>
          </div>
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
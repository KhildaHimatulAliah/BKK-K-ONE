@extends('layouts.superadmin')
@section('contents')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card corona-gradient-card">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="d-flex align-items-center">
            <img src="dashmin/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
            <div class="ml-3">
              <div class="ml-3">
                <div class="mb-0 font-weight-normal d-sm-none">
                  <h4>Hallo,Selamat datang <b style="color: yellow">{{ Auth::user()->name }}</b>!</h4>
                </div>
              </div>                                  
            </div>
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
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Page Alur</h4>
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Gambar </th>
                <th> Judul </th>
                <th> Deskripsi </th>
                <th> Tahap 1 </th>
                <th> Tahap 2 </th>
                <th> Tahap 3 </th>
                <th> Tahap 4 </th>
                <th> Tahap 5 </th>
                <th> Tahap 6 </th>
                <th> Opsi </th>
              </tr>
            </thead>
            @foreach ($page_alur as $alur)
            <tbody>
              <tr>
                <td>
                  <img src="{{('storage/page/'.$alur->gambar) }}" alt="" style="border-radius: 0px; width: 200px; height:100px;"/>
                </td>
                <td style="color: #A9A9A9; white-space: normal;" > {{ $alur->judul }} </td>
                <td style="color: #A9A9A9; white-space: normal;" > {!! $alur->deskripsi !!} </td>
                <td style="color: #A9A9A9"> {{ $alur->tahap_1 }} </td>
                <td style="color: #A9A9A9"> {{ $alur->tahap_2 }} </td>
                <td style="color: #A9A9A9"> {{ $alur->tahap_3 }} </td>
                <td style="color: #A9A9A9"> {{ $alur->tahap_4 }} </td>
                <td style="color: #A9A9A9"> {{ $alur->tahap_5 }} </td>
                <td style="color: #A9A9A9"> {{ $alur->tahap_6 }} </td>
                <td>
                  <a href="/updatealur/{{ $alur->id }}" class="btn btn-outline-info" style="font-size: 10px;"><i class="mdi mdi-square-edit-outline"></i>EDIT</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection

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
        <h4 class="card-title">Page Footer</h4>
        
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Gambar 1 </th>
                <th> Gambar 2 </th>
                <th> Judul 1 </th>
                <th> Judul 2 </th>
                <th> Teks 1 </th>
                <th> Teks 2 </th>
                <th> Opsi </th>
              </tr>
            </thead>
            @foreach ($page_footers as $footer)
            <tbody>
              <tr>
                <td>
                  <img src="{{('storage/page/'.$footer->gambar_1) }}" alt="" style="border-radius: 0px; width: 150px; height:130px;"/>
                </td>
                <td>
                  <img src="{{('storage/page/'.$footer->gambar_2) }}" alt="" style="border-radius: 0px; width: 200px; height:100px;"/>
                </td>
                <td style="color: #A9A9A9; white-space: normal;"> {{ $footer->judul_1 }} </td>
                <td style="color: #A9A9A9; white-space: normal;"> {{ $footer->judul_2 }} </td>
                <td style="color: #A9A9A9; white-space: normal;"> {{ $footer->text_1 }} </td>
                <td style="color: #A9A9A9; white-space: normal;"> {{ $footer->text_2 }} </td>
                <td>
                  <a href="/updatefooter/{{ $footer->id }}" class="btn btn-outline-info" style="font-size: 10px;"><i class="mdi mdi-square-edit-outline"></i>EDIT</a>
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

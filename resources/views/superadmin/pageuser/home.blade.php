@extends('layouts.superadmin')
@section('contents')
 <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
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
        <h4 class="card-title">Page Home</h4>
        
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                {{-- <th> ID </th> --}}
                <th> Gambar </th>
                <th> Teks 1 </th>
                <th> Teks 2 </th>
                <th> Teks 3 </th>
                <th> Opsi </th>
              </tr>
            </thead>
            @foreach ($page_homes as $home)
            <tbody>
              <tr>
                <td>
                  <img src="{{('storage/page/'.$home->gambar) }}" alt="" style="border-radius: 0px; width: 160px; height:100px;"/>
                </td>
                <td style="color: #A9A9A9; white-space: normal;"> {{ $home->teks_1 }} </td>
                <td style="color: #A9A9A9; white-space: normal;"> {{ $home->teks_2 }} </td>
                <td style="color: #A9A9A9; white-space: normal;"> {{ $home->teks_3 }} </td>
                <td>
                  <a href="/updatehome/{{ $home->id }}" class="btn btn-outline-info" style="font-size: 10px;"><i class="mdi mdi-square-edit-outline"></i>EDIT</a>
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

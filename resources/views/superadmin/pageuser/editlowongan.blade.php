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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Lowongan</h4>
                  <form action="/newhome/{{ $lowongan->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Foto</label>
                      <div class="col-sm-9">
                        <input type="file" name="gambar" class="form-control" id="gambar" value="{{ $lowongan->gambar }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">ID Perusahaan</label>
                      <div class="col-sm-9">
                        <input type="text" name="tekt_1" class="form-control" id="tekt_1" value="{{ $lowongan->teks_1 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tanggal Publish</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_2" class="form-control" id="teks_2" value="{{ $lowongan->teks_2 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_2" class="form-control" id="teks_2" value="{{ $lowongan->teks_2 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Posisi Lowongan</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">ID Tahapan</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Judul 1</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Judul 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Judul 3</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Judul 4</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Judul 5</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Teks 1</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_1" class="form-control" id="teks_1" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Teks 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_2" class="form-control" id="teks_2" value="{{ $lowongan->teks_2 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Teks 3</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_3" class="form-control" id="teks_3" value="{{ $lowongan->teks_3 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Teks 4</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_4" class="form-control" id="teks_4" value="{{ $lowongan->teks_4 }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Teks 5</label>
                      <div class="col-sm-9">
                        <input type="text" name="teks_5" class="form-control" id="teks_5" value="{{ $lowongan->teks_5 }}">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection


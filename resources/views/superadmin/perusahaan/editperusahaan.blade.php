@extends('layouts.superadmin')
@section('contents')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card corona-gradient-card">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="col-4 col-sm-3 col-xl-2">
            <img src="{{ asset('dashmin/images/dashboard/Group126@2x.png') }}" class="gradient-corona-img img-fluid" alt="">
          </div>
          <div class="col-5 col-sm-7 col-xl-8 p-0">
            <h4 class="mb-1 mb-sm-0">Selamat datang di Panggung Kreativitas, {{ Auth::user()->name }}!</h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">Di sini Anda memiliki kendali penuh untuk mengubah dan memperbarui tampilan halaman utama</p>
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
                  <h4 class="card-title">Edit Perusahaan</h4>
                  <hr>
                  <form action="/newperusahaan/{{ $perusahaan->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Logo Perusahaan</label>
                      <div class="col-sm-9">
                        <input type="file" name="logo" class="form-control" id="gambar" value="{{ $perusahaan->logo }}" style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $perusahaan->nama }}" style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $perusahaan->alamat }}" style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Detail Perusahaan</label>
                      <div class="col-sm-9">
                        <input type="textarea" name="detail" class="textarea" id="detail" placeholder="Ketik disini...." value="{{ $perusahaan->detail }}" style="color: white">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
<style>
    form {
      width:800px;
    }
  </style>
  
  <script>
    tinymce.init({
        selector: '.textarea',
        plugins: 'link lists image advlist fullscreen media code table emoticons textcolor codesample hr preview',
        menubar: false,
        skin: 'oxide-dark', // Menambahkan tema "dark mode"
        toolbar: [
            'undo redo | bold italic underline strikethrough forecolor backcolor bullist numlist | blockquote subscript superscript | alignleft aligncenter alignright alignjustify | image media link',
            ' formatselect | cut copy paste selectall | table emoticons hr | removeformat | preview code | fullscreen',
        ],
    });
  </script>

@endsection


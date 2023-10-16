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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Alur</h4>
                  <hr>
                  <form action="/newalur/{{ $alur->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gambar</label>
                      <div class="col-sm-9">
                        <input type="file" name="gambar" class="form-control" id="gambar" value="{{ $alur->gambar }}" style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Judul</label>
                      <div class="col-sm-9">
                        <input type="text" name="judul" class="form-control" id="judul" value="{{ $alur->judul }}"  style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Deskripsi</label>
                      <div class="col-sm-9">
                        <input type="textarea" name="deskripsi" class="textarea" id="deskr" placeholder="Ketik disini...." value="{{ $alur->deskripsi }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tahap 1</label>
                      <div class="col-sm-9">
                        <input type="text" name="tahap_1" class="form-control" id="tahap_1" value="{{ $alur->tahap_1 }}"  style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tahap 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="tahap_2" class="form-control" id="tahap_2" value="{{ $alur->tahap_2 }}"  style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tahap 3</label>
                      <div class="col-sm-9">
                        <input type="text" name="tahap_3" class="form-control" id="tahap_3" value="{{ $alur->tahap_3 }}"  style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tahap 4</label>
                      <div class="col-sm-9">
                        <input type="text" name="tahap_4" class="form-control" id="tahap_4" value="{{ $alur->tahap_4 }}"  style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tahap 6</label>
                      <div class="col-sm-9">
                        <input type="text" name="tahap_5" class="form-control" id="tahap_5" value="{{ $alur->tahap_5 }}"  style="color: white">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tahap 4</label>
                      <div class="col-sm-9">
                        <input type="text" name="tahap_6" class="form-control" id="tahap_6" value="{{ $alur->tahap_6 }}"  style="color: white">
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
      toolbar: [
        'undo redo | bold italic underline strikethrough forecolor backcolor bullist numlist | blockquote subscript superscript | alignleft aligncenter alignright alignjustify | image media link',
        ' formatselect | cut copy paste selectall | table emoticons hr | removeformat | preview code | fullscreen',
      ],
    });
  </script>

@endsection


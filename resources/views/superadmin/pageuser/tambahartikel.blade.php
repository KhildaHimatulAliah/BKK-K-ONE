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
                        <h4 class="mb-1 mb-sm-0">Hallo <b style="color: yellow">{{ Auth::user()->name }} </b>! Ini merupakan tempat bagi anda menambahkan Artikel !</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Di sini, Anda memiliki peran kunci dalam membentuk pengetahuan dan menginspirasi melalui artikel-artikel yang Anda tulis.</p>
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
                    <h4 class="card-title">Tambah Artikel</h4>
                    <form action="/insertdata" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Judul</label>
                        <div class="col-sm-9">
                          <input type="text" name="judul" class="form-control" id="judul" value="">
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Foto</label>
                          <div class="col-sm-9">
                            <input type="file" name="foto" class="form-control" id="foto" value="">
                          </div>
                        </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                          <input type="textarea" name="deskripsi" class="textarea" id="deskripsi" value="">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary me-2 mdi mdi-content-save">Simpan</button>
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
  
  
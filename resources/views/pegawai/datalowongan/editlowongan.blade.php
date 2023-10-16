@extends('layouts.pegawai')
@section('contents')
<div class="col-md-15 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Lowongan</h4>
        <hr>
        <form class="forms-sample"  action="/updatelowonganpeg/{{ $lowongan->id }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nama Pekerjaan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pekerjaan" style="color: rgb(179, 179, 179)" value="{{ $lowongan->name }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi Pekerjaan</label>
            <div class="col-sm-9">
              <input type="textarea" class=".textEditor" id="deskripsi" name="deskripsi" placeholder="Ketik disini...." value="{{ $lowongan->deskripsi }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="keahlian" class="col-sm-3 col-form-label">Keahlian Yang Harus Dimiliki</label>
            <div class="col-sm-9">
              <input type="textarea" class="textEditor" id="keahlian" name="keahlian" placeholder="Ketik disini...." value="{{ $lowongan->keahlian }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="kualifikasi" class="col-sm-3 col-form-label">Kualifikasi</label>
            <div class="col-sm-9">
              <input type="textarea" class="textEditor" id="kualifikasi" name="kualifikasi" placeholder="Ketik disini...." value="{{ $lowongan->kualifikasi }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="informasi_lainya" class="col-sm-3 col-form-label">Informasi Lainya</label>
            <div class="col-sm-9">
              <input type="textarea" class="textEditor" id="informasi_lainya" name="informasi_lainnya" placeholder="Ketik disini...." value="{{ $lowongan->informasi_lainnya }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="batas_pelamar" class="col-sm-3 col-form-label">Batas Pelamar:</label>
            <div class="col-sm-9">
            <input type="number" class="form-control" id="batas_pelamar" name="batas_pelamar" min="1" value="1" value="{{ $lowongan->batas_pelamar }}">
          </div>
          </div>
         
          <div class="form-group row">
            <label for="tanggal_berakhir" class="col-sm-3 col-form-label">Akhir Pendaftaran</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" placeholder="Akhir Pendaftaran" >
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori_jurusan" class="col-sm-3 col-form-label">Kategori Jurusan</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-3">
                        <input type="checkbox" name="kategori_jurusan[]" value="TKRO" /> TKRO<br/>
                    </div>
                    <div class="col-sm-3">
                        <input type="checkbox" name="kategori_jurusan[]" value="TKJ" /> TKJ<br/>
                    </div>
                    <div class="col-sm-3">
                        <input type="checkbox" name="kategori_jurusan[]" value="RPL"/> RPL<br/>
                    </div>
                    <div class="col-sm-3">
                        <input type="checkbox" name="kategori_jurusan[]" value="DPIB"/> DPIB<br/>
                    </div>
                    <div class="col-sm-3">
                        <input type="checkbox" name="kategori_jurusan[]" value="OTKP"/> OTKP<br/>
                    </div>
                    <div class="col-sm-3">
                        <input type="checkbox" name="kategori_jurusan[]" value="AKL"/> AKL<br/>
                    </div>
                    <div class="col-sm-3">
                        <input type="checkbox" name="kategori_jurusan[]" value="SK"/> SK<br/>
                    </div>
                </div>
            </div>
        </div>
        
        
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-dark">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  
  <script type="text/javascript">	
    document.getElementById("checkbox").disabled=true;
</script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>

<style>
    form {
      width:800px;
    }
  </style>
  
  <script>
    tinymce.init({
      selector: '.textEditor',
      plugins: 'link lists image advlist fullscreen media code table emoticons textcolor codesample hr preview',
      menubar: false,
      toolbar: [
        'undo redo | bold italic underline strikethrough forecolor backcolor bullist numlist | blockquote subscript superscript | alignleft aligncenter alignright alignjustify | image media link',
        ' formatselect | cut copy paste selectall | table emoticons hr | removeformat | preview code | fullscreen',
      ],
    });
  </script>


@endsection
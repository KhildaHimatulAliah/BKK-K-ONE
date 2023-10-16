@extends('layouts.user')
@section('contents')

{{-- <link rel="stylesheet" href="{{ asset('public/editprofile/style.css') }}"> --}}

<form class="forms-sample" id="editForm" action="/updateprofile/{{ $profile->id }}" method="post" enctype="multipart/form-data">

    @csrf
    <div class="col-md-15 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">EDIT PROFILE</h4>

                <!-- NIK -->
                <div class="form-group row">
                    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-white" id="nik" name="nik" placeholder="No nik" value="{{ $profile->nik }}">
                    </div>
                </div>

                <!-- Nama Lengkap -->
                <div class="form-group row">
                    <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-white" id="nama_lengkap" name="name" placeholder="Nama lengkap" value="{{ $profile->name}}">
                    </div>
                </div>

                <!-- No WhatsApp -->
                <div class="form-group row">
                    <label for="no_whatsapp" class="col-sm-3 col-form-label">No WhatsApp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-white" id="no_whatsapp" name="no_wa" placeholder="No WhatsApp" value="{{ $profile->no_wa}}">
                    </div>
                </div>

                <!-- Tempat & Tanggal Lahir -->
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-white" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat" value="{{ $profile->tempat_lahir }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control text-white" id="tanggal_lahir" name="tanggal_lahir" value="{{ $profile->tanggal_lahir }}">
                    </div>
                </div>
                <!-- Asal Sekolah -->
                <div class="form-group row">
                    <label for="asal_sekolah" class="col-sm-3 col-form-label">Asal Sekolah</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-white" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah" value="{{ $profile->asal_sekolah }}">
                    </div>
                </div>

                <!-- Jurusan -->
                <div class="form-group row">
                    <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-white" id="jurusan" name="jurusan" placeholder="Jurusan" value="{{ $profile->jurusan }}">
                    </div>
                </div>

                <!-- Tinggi Badan -->
                <div class="form-group row">
                    <label for="tinggi_badan" class="col-sm-3 col-form-label">Tinggi Badan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-white" id="tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan" value="{{ $profile->tinggi_badan }}">
                    </div>
                </div>

                <!-- Berat Badan -->
                <div class="form-group row">
                    <label for="berat_badan" class="col-sm-3 col-form-label">Berat Badan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-white" id="berat_badan" name="berat_badan" placeholder="Berat Badan" value="{{ $profile->berat_badan }}">
                    </div>
                </div>

                <!-- CV -->
                <div class="form-group row">
                    <label for="cv" class="col-sm-3 col-form-label">CV</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="cv" name="cv" accept="file/*">
                        <small class="text-muted"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>
                        <!-- Removed text-white from file input and value attribute -->
                    </div>
                </div>

                <!-- Akta -->
                <div class="form-group row">
                    <label for="akta" class="col-sm-3 col-form-label">Akta</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="akta" name="akta" accept="file/*">
                        <small class="text-muted"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>
                        <!-- Removed text-white from file input and value attribute -->
                    </div>
                </div>


                <!-- Fotocopy Ijazah -->
                <div class="form-group row">
                    <label for="ijazah" class="col-sm-3 col-form-label">Fotocopy Ijazah</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="ijazah" name="ijazah" accept="file/*">
                        <small class="text-muted"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>
                </div>
                </div>
                
                   <!-- KK -->
                   <div class="form-group row">
                    <label for="kk" class="col-sm-3 col-form-label">KK</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="kk" name="kk" accept="file/*">
                        <small class="text-muted"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>
                    </div>
                </div>

                <!-- KTP -->
                <div class="form-group row">
                    <label for="ktp" class="col-sm-3 col-form-label">KTP</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="ktp" name="ktp" accept="file/*">
                        <small class="text-muted"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>
                    </div>
                </div>

                <!-- SKKS -->
                <div class="form-group row">
                    <label for="sks" class="col-sm-3 col-form-label">SKKS</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="sks" name="sks" accept="file/*">
                        <small class="text-muted"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>
                    </div>
                </div>

                <!-- Kartu AK1 -->
                <div class="form-group row">
                    <label for="ak_1" class="col-sm-3 col-form-label">Kartu AK1</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white " id="ak_1" name="ak_1" accept="file/*">
                        <small class="text-muted"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>
                    </div>
                </div>

                <!-- SKCK -->
                <div class="form-group row">
                    <label for="skck" class="col-sm-3 col-form-label">SKCK</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="skck" name="skck" accept="file/*">
                        <small class="text-muted"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>
                    </div>
                </div>

                <!-- Dosis Vaksin -->
                <div class="form-group row">
                    <label for="dosis_vaksin" class="col-sm-3 col-form-label">Dosis Vaksin</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="dosis_vaksin" name="dosis_vaksin" accept="file/*">
                        <small class="text-muted text-danger"><span class="text-danger">*</span> Mohon kirimkan file dalam format PDF.</small>

                    </div>
                </div>

                <!-- Foto -->
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control text-white" id="foto" name="foto" accept="file/*">
                    </div>
                </div>
               

                <!-- Dan seterusnya hingga semua input fields Anda tercover -->

                <button type="button" class="btn btn-primary me-2" onclick="confirmEdit()">Edit</button>
                                <script>
                    function confirmEdit() {
                        var r = confirm("Apakah anda yakin ingin mengedit data diri anda?");
                        if (r == true) {
                            // Setelah konfirmasi, kita submit form
                            document.getElementById("editForm").submit();

                            // Setelah data disimpan atau form disubmit, tampilkan alert berikutnya
                            // Catatan: Ini hanya contoh. Sebenarnya Anda mungkin perlu memastikan data benar-benar disimpan di server sebelum menampilkan alert ini.
                            alert("Data diri anda berhasil di edit");
                        }
                    }
                </script>
                   
                <style>
                     .text-danger {
                        color: red;
                    }
                    .text-muted{
                        color: red;
                    }
                </style>

                <button type="button" onclick="window.history.back()" class="btn btn-dark">Cancel</button>
            </div>
        </div>
    </div>
</form>

@endsection
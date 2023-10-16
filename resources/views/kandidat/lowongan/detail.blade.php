@extends('layouts.user')
@section('contents')
<div id="confirm" style="display:none; position: absolute; top: 100px; left: 50%; transform: translate(-50%, -50%); background-color: #343a40; z-index: 9999; padding: 20px 25px; border-radius: 8px;">
    <h2 style="color: white; font-size: 18px;">Anda yakin ingin mendaftar di perusahaan ini?</h2>
    <div style="display: flex; justify-content: space-between; align-items: center; width: 50%; margin: 20px auto 0px">
        <button class="btn btn-secondary" onclick="hideConfirm('confirm')">
            Batal
        </button>
        <form action="/detaillowongan" method="POST">
            @csrf
            <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}">
            <input type="hidden" id="id_lowongan" name="id_lowongan" value="{{ $lowongan->id }}">
            <input type="hidden" id="id_lowongan" name="id_lowongan" value="{{ $lowongan->id }}">
            <button type="submit" class="btn btn-success">
                Ya, Lanjutkan
            </button>
        </form>
    </div>
</div>


@if (session('success'))
    <div id="alert-success" class="position-absolute top-50 start-50 translate-middle bg-dark border rounded p-4" style="z-index: 9999; max-width: 350px;">
        <button type="button" class="btn-close" onclick="hideConfirm('alert-success')" aria-label="Close"></button>
        <div class="text-center">
            <span class="mdi mdi-check-circle-outline" style="color: #28a745; font-size: 4rem;"></span>
            <h1 class="fs-5 text-white mt-3">Berhasil!</h1>
            <h2 class="fs-6 text-white mb-0">{{ session('success') }}</h2>
        </div>
    </div>

    @push('script')
        <script>
            setTimeout(() => {
                $("#alert-success").fadeOut("slow");
            }, 2000);
        </script>
    @endpush
@endif


@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif




<div class="row">
    <div class="col-md-8 mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <img src="pt.jpeg" alt="Foto Perusahaan" class="img-fluid mb-3">
                <h2 class="card-title">{{ $lowongan->name }}</h2>
                <p class="card-text pt"><i class="fas fa-building"></i> {{ $lowongan->perusahaan->nama }}</p>
                <p class="card-text location"><i class="fas fa-map-marker-alt"></i> {{ $lowongan->perusahaan->alamat }}</p>

                <h3>Detail Pekerjaan</h3>
                <p class="card-text">{!! $lowongan->deskripsi !!}</p>

                <h3>Keahlian yang Harus Dimiliki</h3>
                <p>{!! $lowongan->keahlian !!}</p>

                <h3>Kualifikasi</h3>
                <p class="card-text">{!! $lowongan->kualifikasi !!}</p>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <!-- Card 2 (Kanan Atas) -->
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title">Judul</h2>
                <p class="card-text"><i class="fas fa-chevron-right"></i> Diposting : 2023-03-21</p>
                <p class="card-text"><i class="fas fa-chevron-right"></i> Lowongan : 200 posisu</p>
                <p class="card-text"><i class="fas fa-chevron-right"></i> Sifat Pekerjaan : Full time</p>
                <p class="card-text"><i class="fas fa-chevron-right"></i> Lokasi : Jakarta timur</p>
                <p class="card-text"><i class="fas fa-chevron-right"></i> Akhir Pendaftaran : 2023-04-21</p>
                @if ($cek_pengajuan == 0)
                    <button class="btn btn-success btn-block" onclick="showConfirm()">DAFTAR</button>
                @endif
            </div>
        </div>

        <!-- Card 3 (Kanan Bawah) -->
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title">Judul</h2>
                <ul class="list-unstyled">
                    <li><i class="fas fa-chevron-right"></i> Dolor justo tempor duo ipsum accusam</li>
                    <li><i class="fas fa-chevron-right"></i> Dolor justo tempor duo ipsum accusam</li>
                    <!-- Tambahkan pilihan lain di sini -->
                </ul>
            </div>
        </div>
    </div>
</div>
    
@push('script')
<script>
    function showConfirm(){
        $("#confirm").fadeIn("slow")
    }
    
    function hideConfirm(id){
        $("#"+id).fadeOut("slow");
    }

    
</script>
@endpush

@endsection

<link href="{{  asset('landingpage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{ asset('footer/css/style.css') }}">
<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{ asset('landingpage/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/templatemo-digimedia-v1.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/animated.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/css/owl.css') }}">
<link rel="stylesheet" href="{{ asset('job/style.css') }}">
<style>
    .custom-header {
    background-color: #ffffff; /* Latar belakang putih untuk header */
    box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan untuk memberi kesan "terangkat" */
}

.custom-brand {
    display: flex;
    align-items: center; /* Akan membuat teks logo sejajar dengan logo */
    font-weight: 600;   /* Membuat teks logo sedikit tebal */
    color: #333;        /* Warna teks logo */
    text-decoration: none; /* Menghapus garis bawah dari tautan */
}

.custom-logo {
    width: 40px;  /* Ukuran logo */
    height: 40px;
    margin-right: 10px; /* Jarak antara logo dan teks */
}

.custom-menu {
    font-weight: 500;  /* Membuat teks menu sedikit tebal */
}

.custom-link {
    color: #333; /* Warna teks menu */
    margin-left: 15px; /* Jarak antar item menu */
}

.custom-link:hover {
    color: #007BFF; /* Warna teks saat di-hover */
    text-decoration: none; /* Menghapus garis bawah saat di-hover */
}




</style>
<header class="custom-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand custom-brand" href="#">
                        <img src="{{ asset('landingpage/assets/images/logoo.png') }}" alt="Logo BKK" class="custom-logo rounded-circle"> 
                        <span class="custom-text">BKK K-ONE</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto custom-menu">
                            <li class="nav-item">
                                <a class="nav-link custom-link" href="">Lowongan</a>
                            </li>
                            <li class="nav-item">
                                <button onclick="history.go(-1);" class="btn btn-sm btn-secondary back-btn">
                                    <i class="fas fa-arrow-left"></i> Back
                                </button>
                            </li>
                            <style>
                            .back-btn {
                            border: 2px solid #ce98c7; 
                            border-radius: 20px;
                            padding: 5px 15px; 
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background-color: transparent; 
                            color: #333; /* Mengatur warna teks */
                        }

                        .back-btn:hover {
                            background-color: #ce98c7;
                            color: #ffffff; 
                        }

                        .back-btn i {
                            margin-right: 5px; 
                        }
                        </style>                  
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<style>
    .custom-header {
    position: sticky;
    top: 0;
    z-index: 1000; /* Ini akan memastikan navbar tetap di atas konten lainnya */
    background-color: #ffffff; /* Pastikan memiliki background warna untuk mencegah konten di bawahnya muncul melalui navbar saat discroll */
}
</style>
<br>
<br>
<br>
<style>
    .search-container {
    position: relative;
    display: inline-block;
    padding-left: 25px; /* Ruang untuk icon search di sebelah kiri */
    margin-left: 15px;
}

.search-input {
    border: none;
    border-bottom: 2px solid #000;
    background-color: transparent;
    padding-left: 10px; 
    outline: none;
    font-size: 16px;
    width: auto;  /* Width otomatis sesuai teks */
}

.search-icon {
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #000;
}
</style>
<div class="container mt-4">
 <div class="card">
<div class="card-body">
<div class="container mt-4">
 
    <div class="col-lg-12 text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
        <div id="job" class="section-heading">
            <h4>Job Vacancy</h4>
        </div>
    </div>
    <form class="search-container" action="{{ route('additionaljobs') }}" method="GET">
        <input type="text" name="search" class="search-input" placeholder="Search...">
        <button type="submit" style="border: none; background: none;">
            <i class="fas fa-search search-icon"></i>
        </button>
    </form>
    <br>
    <br>
    <br>
    <div class="row justify-content-center"> <!-- Row dengan justify-content-center untuk menengahkan konten -->
        <div class="col-lg-50"> <!-- ukuran col-lg-8 agar konten tidak terlalu lebar di layar besar -->
            @foreach ($lowongans as $l)
            <div class="card mb-4"> <!-- Menghilangkan style inline untuk background dan border -->
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-8 d-flex align-items-center">
                            @if($l->perusahaan)
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/logoperusahaan/'.$l->perusahaan->logo) }}" alt="" style="width: 80px; height: 60px; margin: 3px;">
                            @else
                                <img class="flex-shrink-0 img-fluid border rounded" src="path_ke_gambar_placeholder" alt="Placeholder Image">
                            @endif
                            <div class="text-start ps-4">
                                <h6 class="me-3">{{ $l->perusahaan->nama }}</h6> <!-- Hapus .text-truncate dari sini -->
                                <span class="me-3"><i class="fas fa-map-marker-alt"></i>{{$l->perusahaan->alamat}}</span> <!-- Hapus .text-truncate dari sini -->
                            </div>
                            
                        </div>

                    <style>
                        .card {
                        border-radius: 10px; /* Pembulatan sudut card */
                        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Bayangan card */
                        margin: 20px 0; /* Margin atas dan bawah untuk memberikan ruang antara card dan elemen lainnya */
                    }
                    .truncate-text {
                        display: inline-block;
                        max-width: 100%;
                        white-space: normal; /* membiarkan teks lompat ke baris berikutnya */
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }
                    .text-start {
                        .text-start {
    white-space: normal; /* Pastikan teks beralih ke baris berikutnya */
}

@media (max-width: 576px) { /* Untuk layar kecil seperti ponsel */
    .text-start h6, .text-start span {
        font-size: 0.9rem; /* Mengurangi ukuran font untuk layar kecil */
    }
}

                    /* Saat layar berukuran lebih dari 768px (misalnya desktop) */
                    @media (min-width: 769px) {
                        .truncate-text {
                            text-overflow: clip; /* menghapus ellipsis */
                        }
                    }
                    </style>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex">
                            <a class="btn btn-outline-primary" style="font-size: 10px; margin-right: 10px;" href="tahap">Detail</a>
                            <a class="btn btn-outline-warning" style="font-size: 10px; margin-right: 10px;" href="tahap">Apply</a>
                        </div>
                        <div class="mt-3">
                            <small class="text-muted"><span class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        @endforeach
        <style>
         .pagination-wrapper {
                text-align: center; 
            }

            .pagination-wrapper .pagination {
                display: inline-block; 
            }

            .pagination-wrapper .pagination li {
                display: inline-block;
                margin-right: 5px; /* atau sesuaikan sesuai keinginan Anda */
            }
        </style>
       <div class="mt-4 pagination-wrapper">
        {{ $lowongans->appends(['search' => request()->query('search')])->links() }}
    </div>   
    </div>
</div>
</div>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>

@foreach ($page_footers as $footer) {
    <footer class="site-footer">
 <!-- Sisi Kiri -->
<div class="footer-left">
    <img src="{{ asset('storage/foto/' . $footer->gambar_1) }}" alt="Logo" class="footer-logo">
    <div class="footer-left-content">
        <h3>{{ $footer->judul_1  }}</h3>
        <p>{{ $footer->text_1 }}</p>
    </div>
</div>

<!-- Tengah -->
<div class="footer-center">
    <h3>{{ $footer->judul_2 }}</h3>
    <p>{{$footer->text_2}}</p>
</div>

<!-- Sisi Kanan -->
<div class="footer-right">
    <img src="{{ asset('storage/foto/' . $footer->gambar_2)}}" alt="Foto" class="footer-photo">
</div>
</footer>
}@endforeach
<!-- Copyright -->
<div class="footer-copyright">
    <p>KHAINTARI©2023 | All RIGHT RESERVED</p>
</div>
<style>
    /* Mengurangi ukuran font untuk judul */
   /* Menentukan font (misalnya dari Google Fonts) */
   @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

/* Mengatur font untuk seluruh footer */
            .site-footer {
                font-family: 'Roboto', sans-serif;
                color: black;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
            }

            .footer-left-content h3,
            .footer-center h3 {
                font-size: 18px;
                line-height: 1.2;
                margin: 0;
                padding: 0;
            }

            .footer-left-content p,
            .footer-center p {
                font-size: 14px;
                line-height: 1.2;
                margin-top: 5px;
                margin-bottom: 5px;
                color: black;
            }

            .footer-left {
                display: flex;
                align-items: center;
                margin-right: 50px;
                flex-wrap: nowrap;
            }

            .footer-logo {
                margin: 0;
                padding: 10px;
                /* margin-top: 5px; */
                flex-shrink: 0;
                margin-bottom: 60px; /* Mengurangi margin-bottom untuk memberikan kesan lebih ringkas */
            }

            /* CSS untuk iPad */
            @media (max-width: 1024px) and (min-width: 768px) {
                .footer-left {
                    justify-content: center;
                }
                .footer-logo {
                    margin-right: 15px;
                }
            }
            @media (max-width: 767px) {
                .site-footer {
                    flex-direction: column; /* Konten diletakkan secara vertikal */
                    padding: 10px; /* Mengurangi padding agar lebih sesuai dengan layar mobile */
                }
                
                .footer-left-content h3,
                .footer-center h3 {
                    font-size: 16px; /* Mengurangi ukuran font untuk header */
                }

                .footer-left-content p,
                .footer-center p {
                    font-size: 12px; /* Mengurangi ukuran font untuk paragraf */
                }
                
                .footer-left {
                    margin-right: 0;
                    margin-top: 10px;
                    margin-bottom: 10px;
                    flex-wrap: wrap; /* Memungkinkan konten untuk membungkus jika perlu */
                    justify-content: center; /* Tengahkan konten */
                }

                .footer-logo {
                    width: 100px; /* Mengurangi ukuran logo */
                    height: auto; /* Menjaga aspek rasio */
                    margin-bottom: 10px; /* Penyesuaian margin untuk mobile */
                }
            }

</style>
</body>
    </div>
  </form>
</div>
</div>
</div>
</div>
<!-- jQuery library -->
<script src="{{ asset('https://code.jquery.com/jquery-3.5.1.slim.min.js') }}"></script>

<!-- Bootstrap JavaScript -->
<script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js') }}"></script>

<!-- Script untuk Navbar -->
<script>
   $(document).ready(function() {
    $('.navbar-toggler').on('click', function() {
        $('.navbar-collapse').collapse('toggle');
    });
    
    $('.navbar-nav>li>a').on('click', function() {
        $('.navbar-collapse').collapse('hide');
    });
});

</script>

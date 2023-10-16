<link rel="stylesheet" href="{{ asset('semuaartikel/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('footer/css/style.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Head -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                                <a class="nav-link custom-link" href="#artikel">Artikel</a>
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
    z-index: 1000;
    background-color: #ffffff;
    box-shadow: 0px 2px 15px rgb(177, 174, 174); /* Tambahkan bayangan sedikit untuk kedalaman */
}

.navbar {
    padding: 0.5rem 1rem; /* Ukuran padding yang lebih besar */
}

.custom-brand {
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #ffffff;
    text-decoration: none;
}

.custom-logo {
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.custom-menu {
    font-weight: 500;
}

.custom-link {
    color: #ffffff;
    margin-left: 15px;
    padding: 5px 10px; /* Tambahkan padding untuk efek hover */
    transition: background-color 0.3s, color 0.3s; /* Efek transisi saat hover */
}

.custom-link:hover, .custom-link:focus {
    color: #ffffff;               /* Ganti teks menjadi putih saat di-hover */ 
    text-decoration: underline;  /* Tambahkan garis bawah */
    text-decoration-color: purple; /* Warna garis bawah menjadi ungu */
    border-radius: 5px;          /* Pembulatan sudut saat di-hover */
}

</style>
<h1 class="main-title text-center">ARTIKEL</h1>
<div class="container">
    <div class="row">
        @foreach ($artikel as $key => $item)
            @if($key % 2 == 0) <!-- Mulai setiap baris baru untuk setiap dua artikel -->
            <div class="col-md-6">
                <div class="article-card">
                    <img src="{{ asset('storage/foto/'.$item->foto) }}" alt="Artikel Image" style="width: 100%; height: 50%; object-fit: cover; border-radius: 20px 20px ;">
                </a>
                    <div class="card-content">
                        <h6>{{ $item->judul }}</h6>
                        <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}</span>
                        <p>{{ Str::substr($item->deskripsi, 0, 56) }}</p>
                        <a href="{{ route('artikelselengkapnya', $item->id) }}" class="btn btn-outline-info btn-fw">SELENGKAPNYA</a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-6">
                <div class="article-card">
                    <img src="{{ asset('storage/foto/'.$item->foto) }}" alt="Artikel Image" style="width: 100%; height: 50%; object-fit: cover; border-radius: 20px 20px ;">
                    </a>
                    <div class="card-content">
                        <h6>{{ $item->judul }}</h6>
                        <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}</span>
                        <p>{{ Str::substr($item->deskripsi, 0, 56) }}</p>
                        <a href="{{ route('artikelselengkapnya', $item->id) }}" class="btn btn-outline-info btn-fw">SELENGKAPNYA</a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        <br>
        <br>
        <br>
        <br>
           <style>
        .pagination-wrapper {
            width: 100%; /* Memastikan elemen memiliki lebar penuh */
            height: 100px; /* Anda bisa menyesuaikan ini sesuai kebutuhan */
            position: relative;
            margin-top: 50px;
            display: flex;
            justify-content: center; /* Menengahkan elemen secara horizontal */
            align-items: center;     /* Menengahkan elemen secara vertikal */
        }

            .pagination-wrapper .pagination {
                display: inline-block;
            }

            .pagination-wrapper .pagination li {
                display: inline-block;
                margin-right: 5px;
            }

            </style>       
       <div class="mt-4 pagination-wrapper">
            {{ $artikel->links() }}
        </div>
    </div>
</div>
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
</body>
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
    </div>
  </form>
</div>
</div>
</div>
</div>

<script src="{{ asset('https://code.jquery.com/jquery-3.2.1.slim.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') }}"></script>
<script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function() {
    // Ketika salah satu item navbar diklik
    $('.navbar-nav>li>a').on('click', function() {
        // Collapse/tutup navbar
        $('.navbar-collapse').collapse('hide');
    });
});


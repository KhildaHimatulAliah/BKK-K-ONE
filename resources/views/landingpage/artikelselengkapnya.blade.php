{{-- @extends('landingpage')  --}}

@section('contents')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('artikel/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('footer/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/templatemo-digimedia-v1.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<title>{{ $article->judul }}</title> <!-- Judul Artikel dari Database -->
</head>
<body>
    <style>
        .custom-brand {
            display: flex;
            align-items: center; 
            font-weight: 600;   
            color: #333;        
            text-decoration: none;
            margin-left: 70px;  
        }
        .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1030; /* Pastikan navbar selalu di atas konten lain */
    background-color: white; /* Pastikan navbar tidak transparan */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Tambahkan sedikit bayangan untuk estetika */
}

    
        .custom-menu {
            margin-right: 70px;  
        }
    
        .back-btn {
            border: 2px solid #ce98c7; 
            border-radius: 20px;
            padding: 5px 15px; 
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent; 
            color: #333; 
        }
    
        .back-btn:hover {
            background-color: #ce98c7;
            color: #ffffff; 
        }
    
        .back-btn i {
            margin-right: 5px; 
        }
    
        /* Untuk tampilan mobile */
        @media (max-width: 767px) {
            .custom-brand {
                margin-left: 20px;  /* Menggeser logo ke kanan sedikit */
            }
            .custom-menu {
                margin-right: 70%; /* Menggeser menu ke kiri sedikit */
            }
        }
    </style>
    
    
<!-- Navbar -->
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
                

<br>
<br>
<br>
<br>


<!-- Content -->
<div class="container mt-5">
  <h2>{{ $article->judul }}</h2> <!-- Judul Artikel dari Database -->
  <hr>
  <p class="date">{{ $article->created_at->format('l, j F Y') }}|Admin</p> <!-- Tanggal Pembuatan Artikel dari Database -->
  <div class="image-container">
    <img src="{{ asset('storage/foto/'.$article->foto) }}" alt="Artikel Image" class="centered-image">
</div>
  <p class="article-description">
     {{ $article->deskripsi }} <!-- Deskripsi Artikel dari Database -->
  </p>

  <style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80%;
        position: relative;
    }

    .centered-image {
        max-width: 100%;
        border-radius: 20px 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .article-description {
        margin-top: 10px;
        line-height: 1.6;
        font-size: 16px;
        color: #333;
        text-align: justify;
        font-family: 'Arial', sans-serif;
        text-indent: 2em;
    }

    /* Responsif untuk mobile */
    @media (max-width: 767px) {
        .image-container {
            height: auto;
            padding: 20px 0; /* Beri padding atas dan bawah untuk ruang */
        }

        .centered-image {
            position: static; /* Kembalikan ke posisi awal */
            transform: none;
            width: 90%; /* Biarkan gambar mengambil 90% lebar layar */
            margin: 0 auto; /* Pusatkan gambar */
        }

        .article-description {
            font-size: 15px; /* Anda bisa menyesuaikan ukuran font untuk tampilan mobile */
            margin-top: 20px;
        }
    }

    /* Responsif untuk iPad */
@media (min-width: 768px) and (max-width: 1024px) {
    .image-container {
        height: auto;
        padding: 30px 0; /* Memberi padding yang sedikit lebih banyak untuk iPad */
    }

    .centered-image {
        position: static; /* Kembalikan ke posisi normal */
        transform: none;
        width: 85%; /* Mungkin Anda ingin gambar sedikit lebih besar untuk iPad */
        margin: 0 auto; /* Pusatkan gambar */
    }

    .article-description {
        font-size: 16px; /* Ukuran font standar untuk iPad */
        margin-top: 25px;
    }
}

</style>

</div>
<br>
<br>
<br>
@foreach ($page_footers as $footer) 
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
@endforeach
<!-- Copyright -->
<div class="footer-copyright">
<p>KHAINTARI©2023 | All RIGHT RESERVED</p>
</div>
<style>
    /* Impor font dari Google Fonts */
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
           
            .footer-left-content p, .footer-center p {
                font-size: 14px;
                line-height: 1.2;
                margin-top: 5px;
                margin-bottom: 5px;
                color: black !important;
                font-weight: 400; 
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
            .site-footer .footer-left-content p, .site-footer .footer-center p {
                color: black !important;
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



<!-- Script untuk Bootstrap (JQuery dan Popper.js) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        // Ketika salah satu item navbar diklik
        $('.navbar-nav>li>a').on('click', function() {
            // Collapse/tutup navbar
            $('.navbar-collapse').collapse('hide');
        });
    });
</script>
    </div>
 {{-- @endsection --}}

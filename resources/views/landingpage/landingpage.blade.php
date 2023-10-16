<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  {{-- <meta name="viewport" content="width=1200">  --}}
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">




  <title>BKK | K-ONE</title>

    <!-- Bootstrap core CSS -->
    <link href="{{  asset('landingpage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('image/logosmk.png') }}" />


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('landingpage/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/assets/css/templatemo-digimedia-v1.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('job/style.css') }}">
    <link rel="stylesheet" href="{{ asset('footer/css/style.css') }}">
    <link rel="stylesheet" href="artikellandingpage/css/style.css">
    

<!--

TemplateMo 568 DigiMedia

https://templatemo.com/tm-568-digimedia

-->
  </head>

<body>
  

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
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
                            <li class="nav-item active">
                                <a class="nav-link custom-link" href="#top">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link custom-link" href="#alur">Alur</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link custom-link" href="#artikel">Artikel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link custom-link" href="#job">Lowongan</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<br>
<br>
<br>
<br>



  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
   <!-- Di dalam tampilan Blade Anda -->
   <div class="container" style="margin-top: -20px;">
  <div class="row">
      <div class="col-lg-12">
          <div class="row">
              <div class="col-lg-6 align-self-center">
                  <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                      <div class="row">
                          <div class="col-lg-12">
                              <h6> {{ $page_homes->teks_1 }}</h6>
                              <h2>{{ $page_homes->teks_2 }}</h2>      
                              {{ $page_homes->teks_3 }}
                          
                          </div>
                          
                          <div class="col-lg-12">
                              <div class="border-first-button scroll-to-section">
                                  <a href="/log">LOGIN</a>             
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
              <div class="col-lg-6">
                  <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                      <!-- Menampilkan gambar dari model PageHome -->
                      <img src="{{ asset('storage/page/' . $page_homes->gambar) }}" alt="gambar">
                  </div>
              </div>


              <style>
              .custom-header {
                position: sticky;
                top: 0;
                z-index: 1000; /* Ini akan memastikan navbar tetap di atas konten lainnya */
                background-color: #ffffff; /* Pastikan memiliki background warna untuk mencegah konten di bawahnya muncul melalui navbar saat discroll */
            }

            .main-banner {
                padding-top: 70px; /* Sesuaikan nilai ini sesuai dengan tinggi navbar Anda */
            }

            .right-image img {
                width: 100%;
                max-width: 300px;
                display: block;
                margin: 0 auto;
                z-index:10; /* Kita tetapkan z-index gambar lebih rendah */
                position: relative; /* Properti ini memastikan bahwa z-index bekerja */
            }

/* Untuk Navbar */
            .navbar {
                z-index: 1000; /* Kita tetapkan z-index navbar lebih tinggi */
                position: relative; /* Properti ini memastikan bahwa z-index bekerja */
            }

            /* Media Query untuk perangkat dengan lebar maksimal 992px */
            @media (max-width: 992px) {
                .right-image {
                    display: none;
                }
            }
    
            </style>
            
            
          </div>
      </div>
  </div>
</div>
<br>
<br>
<br>
@foreach ($alur as $alur)     
<div id="alur" class="about section">
    <div class="container">
        <div class="row">
  
            <!-- Judul dan Deskripsi -->
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="section-heading">
                    <h4>{{ $alur->judul }}</h4> 
                    <div class="line-dec"></div>
                </div>
  
                <!-- Deskripsi dan Tahapan -->
                <div class="about-right-content">
                    <p>{{ $alur->deskripsi }}</p>
                    <div class="step-container">
                        <div class="step-number">1</div>
                        <div class="step-description">{{ $alur->tahap_1 }}</div>
                    </div>
                    <div class="step-container">
                        <div class="step-number">2</div>
                        <div class="step-description">{{ $alur->tahap_2 }}</div>
                    </div>
                    <div class="step-container">
                        <div class="step-number">3</div>
                        <div class="step-description">{{ $alur->tahap_3 }}</div>
                    </div>
                    <div class="step-container">
                        <div class="step-number">4</div>
                        <div class="step-description">{{ $alur->tahap_4 }}</div>
                    </div>
                </div>
            </div>
  
            <!-- Gambar -->
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="about-left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{ asset('storage/page/' . $alur->gambar) }}" alt="gambar" class="float-right">
                </div>
            </div>
     
        </div>
    </div>
  </div>
  

   @endforeach
   <style>
    @media (max-width: 767px) {
    #alur {
        margin-bottom: 15px;
    }
    .blog-post .down-content {
        margin-top: 5px;
    }
    .blog-post {
        margin-bottom: 10px;
    }

    
}
   </style>
 
  <div id="artikel" class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="section-heading">
                    <p>AYO BACA</p>
                    <h4>Artikel </h4>
                    <p>Disini</p>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
        <style>
           ..blog-post {
                display: flex;
                flex-direction: column-reverse;
            }

            @media (min-width: 769px) {
                .blog-post {
                    flex-direction: column;
                }
            }
        </style>

@php
$firstArticle = $artikel->shift();
@endphp
<div class="row">
    <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
        <div class="blog-post">
            <a href="#"><img src="{{ asset('storage/foto/' . $firstArticle->foto) }}" alt=""></a>
            <div class="down-content">
                <span class="date">{{ $firstArticle->created_at->format('j F Y') }}</span>
                <a href="#"><h4>{{ $firstArticle->judul }}</h4></a>
                <p>{{ Str::substr($firstArticle->deskripsi, 0, 48) }}</p>
                <div class="border-first-button">
                    <a href="{{ route('artikelselengkapnya', $firstArticle->id) }}">SELENGKAPNYA</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
        @foreach ($artikel as $item)
            <div class="blog-post" style="margin-bottom: 20px;"> 
                <!-- Thumbnail Gambar -->
                <a href="#" style="display: block; height: 100%;">
                    <img src="{{ asset('storage/foto/'.$item->foto) }}" alt="Artikel Image">
                </a>
                <style>
                    img {
                        width: 100%;
                        height: auto;
                        object-fit: cover;
                    }
                </style>
                <!-- Konten Artikel di sisi kanan -->
                <div class="down-content" style="flex: 1; text-align: left; padding-left: 20px;">
                    <span style="font-size: 1.25em; font-weight: bold; display: block; margin-bottom: 10px;">
                        {{ $item->judul }}
                    </span>
                    <span class="date" style="color: black; font-size: 0.9em; display: block; margin-bottom: 10px;">
                        {{ $item->created_at->format('j F Y') }}
                    </span>
                    <p>{{ Str::substr($item->deskripsi, 0, 48) }}...</p>
                    <div class="border-first-button" style="margin-top: 10px;">
                        <a href="{{ route('artikelselengkapnya', $item->id) }}">SELENGKAPNYA</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    


    {{-- <style>
        /* Mengatur lebar dari semua .blog-post untuk menjadi sama */
        .blog-post {
        width: 85%; 
        margin: 5px auto 40px;
        display: flex;
        align-items: center;
    }
    
    .blog-post .thumb img {
        width: 200px; 
        height: 50%; 
        object-fit: cover;
        display: block;
        margin: 0 auto; 
    }


        /* Tetapkan gambar untuk memenuhi lebar dari .thumb */
        .blog-post .thumb img, .show-up .blog-post .thumb img {
            display: block;
            width: 100%;
            max-width: 100%;  /* Memastikan lebar maksimalnya tidak melebihi container */
            height: auto;
            object-fit: cover;  /* Memastikan gambar menutupi seluruh area tetapi tetap menjaga aspek rasionya */
        }
        .col-lg-6:not(.show-up) .blog-post .thumb, .col-lg-6:not(.show-up) .blog-post .thumb a {
            width: 100%;
            padding: 0;
            margin: 0;
        }
        
        /* Untuk tampilan mobile */
        @media (max-width: 767px) {
            .blog-post .thumb {
                flex: 0 0 100%;
                max-width: 100%;
                margin-right: 0;
            }
            .blog-post .down-content {
                padding-left: 0;
                padding-top: 20px;
            }
        }
    </style>
     --}}
    
</div>
        <div class="d-flex justify-content-center mt-3">
            <a class="btn btn-outline-primary" href="{{ route('semuaartikel') }}">Semua Artikel</a>
        </div>
    </div>
</div>

  </div>

<div class="container mt-4">
    <div class="card-body animated-bg">
    <div class="col-lg-12 text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
        <div id="job" class="section-heading">
            <h4>Job Vacancy</h4>
        </div>
    </div>
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
                                <h6 class="text-truncate me-3">{{ $l->perusahaan->nama }}</h6>
                                <span class="text-truncate me-3 truncate-text"><i class="fas fa-map-marker-alt"></i>{{$l->perusahaan->alamat}}</span>
                            </div> 
                        </div>
        
                                 <style>
                    .truncate-text {
                        display: inline-block;
                        max-width: 100%;
                        white-space: normal; /* membiarkan teks lompat ke baris berikutnya */
                        overflow: hidden;
                        text-overflow: ellipsis;
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
                                    <a class="btn btn-outline-primary" style="font-size: 10px; margin-right: 10px;" href="{{ route('detailjob', $l->id) }}">Detail</a>
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
      
              </div>
          </div>
      
          <div class="d-flex justify-content-center mt-3">
              <a class="btn btn-outline-primary" href="{{ route('additionaljobs') }}">Semua lowongan</a>
          </div>
      </div>
          </div>
          <br>
          <br>
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


  <!-- Scripts -->
  <script src="{{ asset('landingpage/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('landingpage/assets/js/animation.js') }}"></script>
  <script src="{{ asset('landingpage/assets/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('landingpage/assets/js/custom.js') }}"></script>
  <!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="{{ asset('https://code.jquery.com/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js') }}"></script>
<!-- jQuery, Popper.js, Bootstrap JS -->
<!-- ... konten lain ... -->
<script>
    $(document).ready(function() {
        // Ketika salah satu item navbar diklik
        $('.navbar-nav>li>a').on('click', function() {
            // Collapse/tutup navbar
            $('.navbar-collapse').collapse('hide');
        });
    });
</script>


</body>
</html>
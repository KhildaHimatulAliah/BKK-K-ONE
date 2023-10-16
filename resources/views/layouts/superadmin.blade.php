<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BKK K-ONE | ADMIN</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashmin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="dashmin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('dashmin/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('dashmin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashmin/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashmin/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('dashmin/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('image/logosmk.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <b><p class="sidebar-brand brand-logo bkk">BKK K-ONE</p></b>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('image/smk.png') }}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  @if(auth()->user()->foto && file_exists(public_path('storage/foto/' . auth()->user()->foto)))
                  <img class="img-xs rounded-circle " src="{{ asset('storage/foto/'.auth()->user()->foto) }}" alt="">
                  @else
                  <img class="img-xs rounded-circle " src="{{ asset('storage/foto/default2.jpg') }}" alt="">
                  @endif
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                  <span>{{ Auth::user()->email }}</span>
                </div>
              </div>
            </div>
          </li>
          {{-- <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li> --}}
          <li class="nav-item menu-items {{ request()->segment(1) === 'superadmin' ? 'active' : '' }}" >
            <a class="nav-link" href="{{ url('/superadmin') }}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items {{ request()->segment(1) === 'profilesaya' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/profilesaya') }}">
              <span class="menu-icon">
                <i class="mdi mdi-account-circle"></i>
              </span>
              <span class="menu-title">Profile Saya</span>
            </a>
          </li>
          <li class="nav-item menu-items ">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-book-multiple"></i>
              </span>
              <span class="menu-title">Landing Page</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ in_array( request()->segment(1), ['home', 'updatehome', 'alur', 'updatealur', 'pageartikel', 'updateartikel', 'tambahartikel', 'footer', 'updatefooter']) ? 'show' : '' }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link {{ in_array( request()->segment(1), ['home', 'updatehome']) ? 'active' : '' }}" href="/home">Home</a></li>
                <li class="nav-item"> <a class="nav-link {{ in_array( request()->segment(1), ['alur', 'updatealur']) ? 'active' : '' }}" href="/alur">Alur</a></li>
                <li class="nav-item"> <a class="nav-link {{ in_array( request()->segment(1), ['pageartikel', 'updateartikel', 'tambahartikel']) ? 'active' : '' }}" href="/pageartikel">Artikel</a></li>
                <li class="nav-item"> <a class="nav-link {{ in_array( request()->segment(1), ['footer', 'updatefooter']) ? 'active' : '' }}" href="/footer">Footer</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#basic" aria-expanded="false" aria-controls="basic">
              <span class="menu-icon">
                <i class="mdi mdi-shield-account"></i>
              </span>
              <span class="menu-title">Manajemen User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ in_array(request()->segment(1), ['akunpegawai', 'repaspegawai', 'akunkandidat']) ? 'show' : '' }}" id="basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link {{ in_array(request()->segment(1), ['akunpegawai', 'repaspegawai']) ? 'active' : '' }}" href="/akunpegawai">Pegawai</a></li>
                <li class="nav-item"> <a class="nav-link {{ in_array(request()->segment(1), ['akunkandidat', 'repaskandidat']) ? 'active' : '' }}" href="/akunkandidat">Kandidat</a></li>
              </ul>
            </div>
          </li>                         
          <li class="nav-item menu-items {{ in_array(request()->segment(1), ['perusahaan', 'tambahperusahaan', 'detailperusahaan', 'updateperusahaan']) ? 'active' : ''}}">
            <a class="nav-link {{ in_array(request()->segment(1), ['perusahaan', 'tambahperusahaan', 'detailperusahaan', 'updateperusahaan']) ? 'active' : ''}}" href="{{ url('/perusahaan') }}">
              <span class="menu-icon">
                <i class="mdi mdi-domain"></i>
              </span>
              <span class="menu-title">Data Perusahaan</span>
            </a>
          </li>
          <li class="nav-item menu-items {{ in_array(request()->segment(1), ['datalowongan', 'tambahlowongan', 'detailtahapan', 'editlowongan']) ? 'active' : '' }}">
            <a class="nav-link {{ in_array(request()->segment(2), ['datalowongan', 'tambahlowongan', 'detailtahapan', 'editlowongan']) ? 'active' : '' }}" href="{{ url('/datalowongan') }}">
              <span class="menu-icon">
                <i class="mdi mdi-briefcase-account"></i>
              </span>
              <span class="menu-title">Data Lowongan</span>
            </a>
          </li>
          <li class="nav-item menu-items {{ in_array(request()->segment(1), ['manajemenkandidat', 'detailkandidat']) ? 'active' : '' }}">
            <a class="nav-link {{ in_array(request()->segment(1), ['manajemenkandidat', 'detailkandidat']) ? 'active' : '' }}" href="/manajemenkandidat">
              <span class="menu-icon">
                <i class="mdi mdi-account-group-outline"></i>
              </span>
              <span class="menu-title">Manajemen Kandidat</span>
            </a>
          </li>
          <li class="nav-item menu-items {{ in_array(request()->segment(1), ['datajurusan', 'tambahjurusan']) ? 'active ' : '' }}">
            <a class="nav-link {{ in_array(request()->segment(1), ['datajurusan', 'tambahjurusan']) ? 'active ' : '' }}" href="/datajurusan">
              <span class="menu-icon">
                <i class="mdi mdi-school"></i>
              </span>
              <span class="menu-title">Data Jurusan</span>
            </a>
          </li>
          <li class="nav-item menu-items {{ in_array(request()->segment(1), ['nis', 'tambahnis', 'editnis']) ? 'active' : '' }}">
            <a class="nav-link {{ in_array(request()->segment(1), ['nis', 'tambahnis', 'editnis']) ? 'active' : '' }}" href="/nis">
              <span class="menu-icon">
                <i class="mdi mdi-account-key"></i>
              </span>
              <span class="menu-title">Data NIS</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn-logout nav-link" onclick="return confirm ('Anda yakin Akan Keluar?')" style="background: none; border: none;">
                    <span class="menu-icon">
                        <i class="mdi mdi-logout"></i>
                    </span>
                    <span class="menu-title">Logout</span>
                </button>
            </form>
        </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="/superadmin"><img src="image/smk.png" alt="logo" /></a>
          </div>
          {{-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing" style="color: white"></span>
          </button> --}}
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch justify-content-between">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="dashmin/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="dashmin/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="dashmin/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              {{-- <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li> --}}
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    @if(auth()->user()->foto && file_exists(public_path('storage/foto/' . auth()->user()->foto)))
                    <img class="img-xs rounded-circle " src="{{ asset('storage/foto/'.auth()->user()->foto) }}" alt="">
                    @else
                    <img class="img-xs rounded-circle " src="{{ asset('storage/foto/default2.jpg') }}" alt="">
                    @endif
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <a class="dropdown-item preview-item {{ request()->segment(1) === 'profilesaya' ? 'active' : '' }}" href="{{ url('/profilesaya') }}">
                      <span class="menu-icon">
                        <i class="mdi mdi-account" style="color: green;"></i>
                      </span>
                      <span class="preview-subject" style="margin: 10px 10px 10px 18px; font-size:15px;">Profile Saya</span>
                    </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <span class="menu-icon">
                      <i class="mdi mdi-logout" style="color: red;"></i>
                    </span>
                    <form action="/logout" method="post">
                        <form action="/logout" method="post">
                          @csrf
                          <button type="submit" class="btn-logout nav-link fa fa-sign-out-alt" onclick="return confirm ('Anda yakin Akan Keluar?')" style="background: none; border: none;">Log-out</button>
                      </form>
                  </a>
                </div>
            </ul>
           
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            </div>
            @yield('contents')
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © KHAINTARI 2023</span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="{{ asset('dashmin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('dashmin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dashmin/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('dashmin/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('dashmin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dashmin/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashmin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dashmin/js/hoverable-collapse.js') }}"></script>
    {{-- <script src="{{ asset('dashmin/js/misc.js') }}"></script> --}}
    <script src="{{ asset('dashmin/js/settings.js') }}"></script>
    <script src="{{ asset('dashmin/js/todolist.js') }}"></script>
    {{-- <script src="{{ asset('dashmin/js/dashboard.js') }}"></script> --}}
    <script src="{{ asset('dashmin/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dashmin/js/chartist.js') }}"></script>
    <script src="{{ asset('dashmin/js/jquery.js') }}"></script>
    <script src="{{ asset('dashmin/js/flot-chart.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
          var sidebar = $('.sidebar');
         var body = $('body');
        $('[data-toggle="minimize"]').on("click", function() {
        
          $('body').toggleClass('sidebar-icon-only');
       
    });
      </script>
      
    @stack('script')
  </body>
</html>
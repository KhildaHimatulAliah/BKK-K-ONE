@extends('layouts.superadmin')
@section('contents')
        <!-- partial -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="row align-items-center">
                        <div class="col-12 col-sm-4 col-xl-3">
                          <div class="row">
                            <div class="col-12 col-sm-4 col-xl-3">
                              <div class="d-flex align-items-center">
                                <img src="dashmin/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                                <div class="ml-3">
                                  <div class="ml-3">
                                    <div class="mb-0 font-weight-normal d-sm-none">
                                      <h4>Hallo <b style="color: yellow">{{ Auth::user()->name }}</b><br> Selamat Datang di <br>Dashboard Admin!</h4>
                                    </div>
                                  </div>                                  
                                </div>
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
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ $count_kandidat }}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <span class="mdi mdi-account"></span>
                    </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Kandidat</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ $count_perusahaan }}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <span class="mdi mdi-domain"></span>
                    </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Perusahaan</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ $count_lowongan }}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <span class="mdi mdi-briefcase"></span>
                    </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Lowongan</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ $kandidat_diterima }}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                          <span class="mdi mdi-account"></span>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Kandidat Yang Diterima</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="margin-bottom: 40px">Persentase Jenis Kelamin</h4>
                    <canvas id="pieChart" style="height:500px; width: 500px; margin-top: 10px;"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">List Lowongan</h4>
                      <p class="text-muted mb-1">Data terakhir yang anda tambahkan</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        @foreach($lowongan as $low)
                        <div class="preview-list">
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <i class="mdi mdi-file-document"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <a href="datalowongan" style="text-decoration: none; color:white;" class="preview-subject">{{ $low->name }}</a>
                                <p class="text-muted mb-0">{{ $low->perusahaan->nama }}</p>
                              </div>
                              <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">{{ $low->created_at->diffForHumans()}}</p>
                                <p class="text-muted mb-0">30 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    {{ $lowongan->links() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-15 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Persentase Pelamar</h4>
                  <canvas id="barChart" style="height:230px"></canvas>
                </div>
              </div>
            </div>

          <!-- partial -->
        <!-- main-panel ends -->
    @endsection
    @push('script')
    <script>
      $('[data-toggle="minimize"]').on("click", function() {
      if ((body.hasClass('sidebar-toggle-display')) || (body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
      } else {
        body.toggleClass('okesidebar-icon-only');
      }
    });
      </script>
    <script>
      var doughnutPieData = {
      datasets: [{
        data: {!! json_encode($jml_jk) !!} ,
        borderColor: [
          'rgba(75, 192, 192, 1)',
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.5)',
          'rgba(255, 99, 132, 0.5)',
          'rgba(255, 206, 86, 0.5)',
          'rgba(75, 192, 192, 0.5)',
          'rgba(153, 102, 255, 0.5)',
          'rgba(255, 159, 64, 0.5)'
        ],
      }],
  
      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels:  {!! json_encode($label_jk) !!}
    };

    var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };

  if ($("#pieChart").length) {
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }
      </script>
      <script>
          var data = {
          labels: {!! json_encode($label_low) !!},
          datasets: [{
          label:  {!! json_encode($label_low) !!},
          data: {!! json_encode($jml_low) !!},
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1,
          fill: false
        }]
      };
      var options = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              color: "rgba(204, 204, 204,0.1)"
            }
          }],
          xAxes: [{
            gridLines: {
              color: "rgba(204, 204, 204,0.1)"
            }
          }]
        },
        legend: {
          display: false
        },
        elements: {
          point: {
            radius: 0
          }
        }
      };
            if ($("#barChart").length) {
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            // This will get the first returned node in the jQuery collection.
            var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: data,
            options: options
        });
      }
      </script>
      
    @endpush
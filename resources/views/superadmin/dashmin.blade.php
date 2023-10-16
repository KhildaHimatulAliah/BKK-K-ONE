@extends('layouts.superadmin')
@section('contents')
        <!-- partial -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="dashmin/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h5>Hallo <b style="color: yellow">{{ Auth::user()->name }}</b>, Selamat Datang di Dashboard Admin!</h5>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Kamu memiliki kendali penuh atas seluruh aktivitas di Sistem Informasi BKK ini!</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
                        <span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="margin-bottom: 40px">Grafik Jenis Kelamin</h4>
                    <canvas id="pieChart" style="height:500px; width: 500px; margin-top: 10px;"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">List Lowongan</h4>
                    </div>
                      <div class="col-12">
                        @foreach($lowongan as $low)
                        <div class="preview-list">
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <img src="{{ ('storage/logoperusahaan/'. $low->perusahaan->logo) }}" alt="">
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <a href="datalowongan" style="text-decoration: none; color:white;" class="preview-subject">{{ $low->name }}</a>
                                <p class="text-muted mb-1 mt-1" style="font-size: 13px">{{ $low->perusahaan->nama }}</p>
                                <p class="text-muted mb-0" style="font-size: 11px">{{ $low->perusahaan->alamat }}</p>
                              </div>
                             
                              <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">{{ $low->created_at->diffForHumans()}}</p>
                                {{-- <p class="text-muted mb-0">30 tasks, 5 issues </p> --}}
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      <br>
                    {{ $lowongan->links() }}
                  </div>
                </div>
              </div>
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Grafik Pelamar</h4>
                  <canvas id="barChart" style="height:230px"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h6 class="card-title" style="margin-bottom: 40px">Grafik Kandidat Setiap Jurusan</h6>
                  <canvas id="transaction-history" class="transaction-chart"></canvas>
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
<script>
  if ($("#transaction-history").length) {
var areaData = {
  labels: {!! json_encode($label_jur) !!},
  datasets: [{
      data: {!! json_encode($jml_jur) !!},
      backgroundColor: [
        "#111111","#00d25b","#ffab00"
      ]
    }
  ]
};
var areaOptions = {
  responsive: true,
  maintainAspectRatio: true,
  segmentShowStroke: false,
  cutoutPercentage: 70,
  elements: {
    arc: {
        borderWidth: 0
    }
  },      
  legend: {
    display: false
  },
  tooltips: {
    enabled: true
  }
}
var transactionhistoryChartPlugins = {
  beforeDraw: function(chart) {
    var width = chart.chart.width,
        height = chart.chart.height,
        ctx = chart.chart.ctx;

    ctx.restore();
    var fontSize = 1;
    ctx.font = fontSize + "rem sans-serif";
    ctx.textAlign = 'left';
    ctx.textBaseline = "middle";
    ctx.fillStyle = "#ffffff";

    var text = "Jurusan", 
        textX = Math.round((width - ctx.measureText(text).width) / 2),
        textY = height / 2.4;

    ctx.fillText(text, textX, textY);

    ctx.restore();
    var fontSize = 0.75;
    ctx.font = fontSize + "rem sans-serif";
    ctx.textAlign = 'left';
    ctx.textBaseline = "middle";
    ctx.fillStyle = "#6c7293";

    var texts = "Total", 
        textsX = Math.round((width - ctx.measureText(text).width) / 1.93),
        textsY = height / 1.7;

    ctx.fillText(texts, textsX, textsY);
    ctx.save();
  }
}
var transactionhistoryChartCanvas = $("#transaction-history").get(0).getContext("2d");
var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
  type: 'doughnut',
  data: areaData,
  options: areaOptions,
  plugins: transactionhistoryChartPlugins
});
}

</script>
    @endpush
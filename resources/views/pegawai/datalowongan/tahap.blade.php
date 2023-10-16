@extends('layouts.pegawai')
@section('contents')
<div class="col-md-15 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Tahap</h4>
        <hr>
        <form class="forms-sample" action="{{ route('tambah-tahapan-pegawai', ['id_lowongan' => request()->id_lowongan]) }}" method="post">
            @csrf
            <div class="d-flex justify-content-between mb-2">
                <button id="tambahTahapan" class="mdi mdi-plus">Tahap</button>                
            </div>
            <div class="mb-2" id="containerTahapan">
              <!-- Input tahapan pertama di sini -->
              <div class="input-group">
                  <input type="text" name="name[]" class="form-control mb-2" placeholder="Tahap 1">
                  <button class="mdi mdi-close hapusTahapan" type="button" style="color: rgb(71, 143, 190); font-size: 20px; background: none; border: none;"></button>
              </div>
          </div> 
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-dark">Cancel</button>
        </form>
      </div>
    </div>
  </div>
  <script>
 document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tambahTahapan').addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah formulir untuk disubmit

        var containerTahapan = document.getElementById('containerTahapan');
        var jumlahTahapan = containerTahapan.children.length + 1;

        var inputBaru = document.createElement('div');
        inputBaru.classList.add('input-group', 'mb-2');

        inputBaru.innerHTML = `
            <input type="text" name="name[]" class="form-control" placeholder="Tahap ${jumlahTahapan}">
           <button class="mdi mdi-close hapusTahapan" type="button" style="color: rgb(71, 143, 190); font-size: 20px; background: none; border: none;"></button>
        `;

        containerTahapan.appendChild(inputBaru);
    });

    document.getElementById('containerTahapan').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('hapusTahapan')) {
            e.target.parentElement.remove();

            // Update label dan placeholder setelah menghapus tahapan
            var containerTahapan = document.getElementById('containerTahapan');
            var inputTahapan = containerTahapan.querySelectorAll('input[name="name[]"]');

            inputTahapan.forEach(function(input, index) {
                input.placeholder = `Tahap ${index + 1}`;
            });
        }
    });
});

    </script>
    
  
@endsection
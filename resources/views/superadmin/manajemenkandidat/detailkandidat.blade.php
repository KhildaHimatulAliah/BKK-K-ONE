@extends('layouts.superadmin')
@section('contents')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card corona-gradient-card">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="col-4 col-sm-3 col-xl-2">
            <img src="{{ asset('dashmin/images/dashboard/Group126@2x.png') }}" class="gradient-corona-img img-fluid" alt="">
          </div>
          <div class="col-5 col-sm-7 col-xl-8 p-0">
            @php
              $lowongan = App\Models\Lowongan::find(request()->segment(2));
             @endphp
        
        <h4 class="mb-1 mb-sm-0">
          Selamat datang di Manajemen Kandidat pada lowongan 
          <i style="color: yellow;">{{ $lowongan->name }}</i> , 
          <b style="color: yellow;">{{ Auth::user()->name }}</b>!
      </h4>
      <p class="mb-0 font-weight-normal d-none d-sm-block">Cek berkas dan status kandidat disini! Dan jangan lupa untuk selalu mengupdate status setiap kandidat ya!</p>
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
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Kandidat</h4>
          <div class="search-container">
            <input type="text" class="search-input" placeholder="">
            <i class="mdi mdi-magnify search-icon"></i>
          </div>
          <div class="mb-3 mt-3 d-flex justify-content-end px-3">
            <div class="d-flex">
              <button type="submit" onclick="history.back()" class="mdi mdi-undo-variant btn btn-outline-success mx-1" style="font-size: 10px;"></button>
              <a href="/unduhkandidat/{{ request()->route("id") }}" class="btn btn-outline-success mx-1" style="font-size: 10px;"><i class="mdi mdi-file-excel"></i>EKSPORT</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="form-check form-check-muted m-0">
                                <label class="form-check-label"></label>
                            </div>
                        </th>
                        <th> No </th>
                        <th> Nama </th>
                        <th> Email </th>
                        <th> Jenis Kelamin </th>
                        <th> Status </th>
                        <th> Opsi </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $item)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->user->jenis_kelamin }}</td>
                            <td>
                              @if ($item->status == "Menunggu")
                              <label class="btn btn-warning" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                                {{ $item->status }}
                              </label>  
                              @endif
                              @if ($item->status == "Seleksi Berkas")
                              <label class="btn btn-info" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                                {{ $item->status }}
                              </label>  
                              @endif
                              @if ($item->status == "Tes 1" || $item->status == "Tes 2" || $item->status == "Tes 3")
                              <label class="btn btn-info" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                                {{ $item->status }}
                              </label>  
                              @endif
                              @if ($item->status == "Pemanggilan")
                              <label class="btn btn-info" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                                {{ $item->status }}
                              </label>  
                              @endif
                              @if ($item->status == "Ditolak")
                              <label class="btn btn-danger" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                                {{ $item->status }}
                              </label>  
                              @endif
                              @if ($item->status == "Done")
                              <label class="btn btn-success" style="font-size: 11px" onclick="setStatus('{{ $item->status }}', '{{ $item->id }}')">
                                {{ $item->status }}
                              </label>  
                              @endif
                                
                            </td>
                            <td>
                                <a href="#" class="btn btn-outline-info" style="font-size: 10px;"><i class="mdi mdi-account-details"></i>DATA KANDIDAT</a>
                                <a class="btn btn-outline-danger" style="font-size: 10px;" href="/kandidatdelete/{{ $item->id }}" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="mdi mdi-delete-empty"></i>HAPUS</a>
                            </td>  
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        </div>
      </div>
    </div>
  </div>
  <div id="status-modal" class="modal" style="display:none;">
    <div class="modal-dialog modal-dialog-centered  mt-3">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
                <button type="button" class="btn-close" onclick="hideStatus()"></button>
            </div>
            <div class="modal-body">
                <form action="/updatestatus" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="mb-1">
                        <label for="status" class="form-label">Pilih Status</label>
                        <select class="form-select" id="status" name="status">
                            <!-- Pilihan status disini -->
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" onclick="hideStatus()">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


  @push('script')
  <script>
    statusList = [
      "Menunggu",
      "Seleksi Berkas",
      "Tes 1",
      "Tes 2",
      "Tes 3",
      "Pemanggilan",
      "Ditolak",
      "Done"
    ]
    function setStatus(status, id){
      $("#id").val(id)
      statusList.forEach((s) => {
        if(status == s){
          $("#status").append(`
          <option value="${s}" selected>${s}</option>
          `)
        }else{
          $("#status").append(`
          <option value="${s}">${s}</option>
          `)
        }
      });
      $("#status-modal").show()
    }
    function hideStatus(){
      $("#status-modal").hide()
    }
  </script>
  @endpush
  @endsection
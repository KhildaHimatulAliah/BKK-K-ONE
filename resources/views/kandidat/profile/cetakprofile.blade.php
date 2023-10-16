<style>
    .excel-table-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
        border: 2px solid #ddd;
    }

    th, td {
        padding: 10px 15px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #d3d3d3;  /* Menyerupai warna header Excel */
        font-weight: bold;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    tr:hover {
        background-color: #f0dbdb;
    }
</style>

<div class="excel-table-title">
    PROFIL KANDIDAT
</div>
<br>
<table>
    <tr>
        <th>Nama Lengkap</th>
        <td>{{ $profile->name }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>{{ $profile->nik }}</td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ $profile->tempat_lahir }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ $profile->tanggal_lahir }}</td>
    </tr>
    <tr>
        <th>Asal Sekolah</th>
        <td>{{ $profile->asal_sekolah }}</td>
    </tr>
    <tr>
        <th>Jurusan</th>
        <td>{{ $profile->jurusan }}</td>
    </tr>
    <tr>
        <th>Tinggi Badan</th>
        <td>{{ $profile->tinggi_badan }}</td>
    </tr>
    <tr>
        <th>Berat Badan</th>
        <td>{{ $profile->berat_badan }}</td>
    </tr>
    <!-- Lanjutkan dengan data lainnya sesuai kebutuhan -->
</table>

<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Logo Perusahaan</th>
        <th>Alamat Perusahaan</th>
        <th>Deskripsi Perusahaan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($perusahaan as $perusahaan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $perusahaan->nama }}</td>
            <td>{{ $perusahaan->logo }}</td>
            <td>{{ $perusahaan->alamat }}</td>
            <td>{{ $perusahaan->detail }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

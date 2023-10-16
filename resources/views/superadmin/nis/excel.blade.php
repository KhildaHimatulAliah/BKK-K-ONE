<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIS</th>
    </tr>
    </thead>
    <tbody>
    @foreach($nis as $nis)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $nis->nama }}</td>
            <td>{{ $nis->nis }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

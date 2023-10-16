<table>
    <thead>
    <tr>
        <th> No </th>
        <th> Foto </th>
        <th> Nama </th>
        <th> Username </th>
        <th> Email </th>
        <th> Jenis Kelamin </th>
    </tr>
    </thead>
    <tbody>
    @foreach($pegawai as $item)
        <tr>
            <td> {{ $loop->iteration }}</td>
            <td>
                <a href="{{ url('storage/foto/'.$item->foto) }}" target="_blank" rel="noopener noreferrer">{{ $item->foto }}</a>
             </td>
            <td> {{ $item->name }}</td>
            <td> {{ $item->username }}</td>
            <td> {{ $item->email }}</td>
            <td> {{ $item->jenis_kelamin }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

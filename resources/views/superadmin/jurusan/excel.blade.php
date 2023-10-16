<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Jurusan</th>
        <th>Code Jurusan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($jurusan as $jurusan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jurusan->name }}</td>
            <td>{{ $jurusan->code }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

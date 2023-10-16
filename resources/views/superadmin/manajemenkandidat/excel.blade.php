<table>
    <thead>
    <tr>
        <th> No </th>
        <th> Nama </th>
        <th> Email </th>
        <th> Jenis Kelamin </th>
        <th> Status </th>
    </tr>
    </thead>
    <tbody>
    @foreach($detail as $detail)
        <tr>
            <td> {{ $loop->iteration }}</td>
            <td> {{ $detail->user->name }} </td>
            <td> {{ $detail->user->email }}</td>
            <td> {{ $detail->user->jenis_kelamin }}</td>
            <td> {{ $detail->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

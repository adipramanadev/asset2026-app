<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Aset</th>
            <th>Kategori</th>
            <th>Tanggal Input</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assets as $i => $aset)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $aset->nama_aset }}</td>
            <td>{{ $aset->kategori->nama_kategori ?? '-' }}</td>
            <td>{{ $aset->created_at->format('Y-m-d') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

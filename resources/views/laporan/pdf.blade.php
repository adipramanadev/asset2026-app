<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Aset PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Laporan Aset</h2>
    <p>
        <strong>Periode:</strong> {{ $periode ?? '-' }}<br>
        <strong>Kategori:</strong> {{ $kategori ?? 'Semua' }}
    </p>
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
</body>
</html>

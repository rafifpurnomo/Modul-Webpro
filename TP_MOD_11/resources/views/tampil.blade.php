<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampilan Data</title>
</head>

<body>
    <h1>Data Tersimpan</h1>

    <p><strong>Nama:</strong> {{ $nama }}</p>
    <p><strong>NIM:</strong> {{ $nim }}</p>

    <a href="{{ route('form') }}">Kembali ke Form</a>
</body>

</html>

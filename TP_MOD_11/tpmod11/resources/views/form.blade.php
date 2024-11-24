<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Input</title>
</head>
<body>
    <h1>Form Input Nama dan NIM</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        <br><br>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="{{ old('nim') }}" required>
        <br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="p-5">
        <h1>Tambah Pegawai Baru</h1>
    
        <form action="{{ route('pegawais.store') }}" method="POST">
            @csrf
            
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nama</span>
                <input type="text" class="form-control" name="name" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Posisi</span>
                <input type="text" class="form-control" name="posisi" placeholder="Posisi" aria-label="Posisi" aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Gaji</span>
                <input type="number" class="form-control" name="gaji" placeholder="Gaji" aria-label="Gaji" aria-describedby="basic-addon1">
            </div>
    
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>

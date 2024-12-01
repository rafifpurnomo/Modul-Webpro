<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="p-5">
        <h1>Data Pegawai</h1>
        <a href="/pegawais/create">
            <button type="button" class="btn btn-primary mt-3 mb-5">Tambah Pegawai</button>
        </a>
        <table class="table ">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Posisi</th>
                <th scope="col">Gaji</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pegawais as $pegawai)
                    <tr scope="row">
                        <td>{{ $loop->iteration }}</td>  
                        <td>{{ $pegawai->name }}</td>
                        <td>{{ $pegawai->posisi }}</td>
                        <td>{{ $pegawai->gaji }}</td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-5">Movie List</h1>
    <div class="container mt-4">
        @if (isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        @if (isset($movies) && count($movies) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Sinopsis</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $index => $movie)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $movie['nama'] }}</td>
                            <td>{{ $movie['deskripsi'] }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('movies.edit', $movie['id_movies']) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('movies.delete', $movie['id_movies']) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus movie ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Tidak ada data film tersedia.</p>
        @endif
        <div class="d-flex justify-content-center">
            <a href="/movies/add">
                <button class="btn btn-primary">Tambah Movie</button>
            </a>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

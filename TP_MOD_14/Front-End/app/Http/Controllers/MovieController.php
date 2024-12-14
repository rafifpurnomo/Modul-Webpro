<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function getAllMovies()
    {
        $response = Http::get('http://localhost:4000/movies/getAllMovies');

        if ($response->successful()) {
            $movies = $response->json()['data'];
            return view('homeMovie', compact('movies'));
        }

        return view('homeMovie', ['movies' => [], 'error' => 'Failed to fetch movies']);
    }

    public function showAddMovieForm()
    {
        return view('addMovie');
    }

    public function addMovie(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_rilis' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        $response = Http::post('http://localhost:4000/movies/addMovies', [
            'nama' => $request->input('nama'),
            'tahun_rilis' => $request->input('tahun_rilis'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        if ($response->successful()) {
            return redirect()->route('movies.add')->with('success', 'Film berhasil ditambahkan!');
        }

        return redirect()->route('movies.add')->withErrors('Gagal menambahkan film. Silakan coba lagi.');
    }

    public function deleteMovie($id_movies)
    {
        $response = Http::delete("http://localhost:4000/movies/deleteMovies/{$id_movies}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Film berhasil dihapus!');
        }

        return redirect()->back()->withErrors('Gagal menghapus film. Silakan coba lagi.');
    }

    public function editMovie($id_movies)
    {
        $response = Http::get("http://localhost:4000/movies/getAllMoviesByID/{$id_movies}");

        if ($response->successful()) {
            $movie = $response->json()['data'][0];
            return view('editMovie', compact('movie'));
        }

        return redirect()->route('homeMovie')->withErrors('Gagal mengambil data movie.');
    }

    public function updateMovie(Request $request, $id_movies)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_rilis' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        $response = Http::put("http://localhost:4000/movies/updateMovies/{$id_movies}", [
            'nama' => $request->input('nama'),
            'tahun_rilis' => $request->input('tahun_rilis'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        if ($response->successful()) {
            return redirect()->route('homeMovie')->with('success', 'Film berhasil diperbarui!');
        }

        return redirect()->back()->withErrors('Gagal memperbarui film.');
    }

}

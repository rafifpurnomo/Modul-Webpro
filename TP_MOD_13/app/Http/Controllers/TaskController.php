<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Menampilkan semua tugas.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task', compact('tasks')); 
    }

    /**
     * Menyimpan tugas baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        Task::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'status' => 'pending',
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
    }
    

    /**
     * Menampilkan form untuk mengedit tugas.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('editTask', compact('task')); 
    }

    /**
     * Menyimpan perubahan tugas setelah diedit.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ]);

        // Update tugas
        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    /**
     * Menghapus tugas yang dipilih.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
    }
}

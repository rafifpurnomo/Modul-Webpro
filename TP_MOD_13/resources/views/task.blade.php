<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-5">Task Management</h1>
    <div class="d-flex justify-content-center mt-3">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

    </div>
    <div class="d-flex justify-content-center mt-5">
        <div class="card border-secondary mb-3" style="width: 30rem;">
            <div class="card-header">Add New Task</div>
            <div class="card-body text-secondary">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="task-name" class="form-label">Task Name</label>
                        <input type="text" class="form-control" id="task-name" name="name" required>
                    </div>
                    <div>
                        <label for="task-desc" class="form-label">Task Description</label>
                        <textarea class="form-control" id="task-desc" name="description" rows="3"></textarea>
                    </div>
                    <div class="p-2 mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <h1 class="text-center mt-5">Task List</h1>
    <div class="d-flex justify-content-center mt-3">
        @if ($tasks->isEmpty())
            <div class="alert alert-info" role="alert">
                No task available
            </div>
        @else
            <table class="table table-bordered" style="width: 50rem;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td><span class="badge bg-{{ $task->status == 'pending' ? 'warning' : 'success' }}">
                                {{ ucfirst($task->status) }}
                            </span></td>
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah kamu ingin menghapus tugas {{$task->name}}')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

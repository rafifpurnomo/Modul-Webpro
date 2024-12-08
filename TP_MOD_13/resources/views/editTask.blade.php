<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-center mt-5">
        <div class="card border-secondary mb-3" style="width: 30rem;">
            <div class="card-header">Edit Task</div>
            <div class="card-body text-secondary">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="task-name" class="form-label">Task Name</label>
                        <input type="text" class="form-control" id="task-name" name="name"
                            value="{{ $task->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="task-desc" class="form-label">Task Description</label>
                        <textarea class="form-control" id="task-desc" name="description" rows="3">{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="task-status" class="form-label">Task Status</label>
                        <select class="form-control" id="task-status" name="status" required>
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                    </div>

                    <div class="p-2 mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

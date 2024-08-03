<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="py-12 m-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-center my-3 pb-3">Edit Task</h1>

                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="m-5">
                    @csrf
                    @method('PATCH')
                    <!-- Title input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form4Example1" class="form-control" name="title" value="{{ old('title', $task->title) }}" />
                    </div>

                    <!-- Task input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form4Example2" class="form-control" name="task" value="{{ old('task', $task->task) }}" />
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="form4Example3" rows="4" name="message">{{ old('message', $task->message) }}</textarea>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="py-12 m-5">
        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-success p-4 bg-opacity-25">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg p-5 ">
                <h1 class="text-center my-3 ms-0 me-0 bg-success bg-opacity-25 rounded-pill">Tasks List</h1>

                <!-- Tasks table -->
                <div class="table-responsive">
                    <table class="table table-striped table-success table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Task</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Show</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td>{{ $task->message }}</td>
                                    <td>{{ ucfirst($task->status) }}</td>
                                    <td>
                                        @if ($task->status == 'pending')
                                            <!-- Accept button -->
                                            <form action="{{ route('tasks.accept', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                            </form>
                                            <!-- Reject button -->
                                            <form action="{{ route('tasks.reject', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm">Reject</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No tasks found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- task_view.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="py-12 m-5">
        <!-- Display success message -->
        <div id="success-message" class="alert alert-success mb-4" style="display:none;"></div>

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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tasks as $task)
                                <tr id="task-{{ $task->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td>{{ $task->message }}</td>
                                    <td>{{ ucfirst($task->status) }}</td>
                                    <td>
                                        @if ($task->status == 'pending')
                                            <button class="btn btn-success btn-sm" onclick="updateTaskStatus({{ $task->id }}, 'accept')">Accept</button>
                                            <button class="btn btn-warning btn-sm" onclick="updateTaskStatus({{ $task->id }}, 'reject')">Reject</button>
                                        @elseif ($task->status == 'processing')
                                            <button class="btn btn-primary btn-sm" onclick="updateTaskStatus({{ $task->id }}, 'complete')">Complete</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateTaskStatus(taskId, action) {
            $.ajax({
                url: '/tasks/' + action + '/' + taskId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#success-message').text(response.message).show();
                    $('#task-' + taskId + ' td:nth-child(5)').text(response.status.charAt(0).toUpperCase() + response.status.slice(1));
                    if (response.status === 'processing') {
                        $('#task-' + taskId + ' td:nth-child(6)').html('<button class="btn btn-primary btn-sm" onclick="updateTaskStatus(' + taskId + ', \'complete\')">Complete</button>');
                    } else if (response.status === 'completed' || response.status === 'rejected') {
                        $('#task-' + taskId).remove();
                    }
                },
                error: function(response) {
                    alert('Error updating task status');
                }
            });
        }
    </script>
</x-app-layout>

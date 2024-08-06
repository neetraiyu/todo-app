<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <div class="py-12 m-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-primary p-4">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg p-5 ">
                <h1 class="text-center my-3 pb-3">Task List</h1>

                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Task</th>
                            <th>Message</th>
                            <th>Assigned User</th>
                            <th>User ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->task }}</td>
                                <td>{{ $task->message }}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->user_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

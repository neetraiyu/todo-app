<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TO DO List') }}
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

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-center my-3 pb-3">To Do app</h1>

                <form action="{{ route('task_01.store') }}" method="POST" row row-cols-lg-auto g-3 justify-content-center align-items-center class="m-5">
                    @csrf
                    <!-- Title input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form4Example1" class="form-control" name="title" placeholder="Enter a Task Title" />
                    </div>

                    <!-- Task input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form4Example2" class="form-control" name="task" placeholder="Enter a Task" />
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="form4Example3" rows="4" name="message" placeholder="Enter a Message"></textarea>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

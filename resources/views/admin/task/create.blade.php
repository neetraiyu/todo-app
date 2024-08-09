<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <div class="py-12">
        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-dark p-4 bg-opacity-25">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg p-5 ">
                <h1 class="text-center my-3 ms-0 me-0 bg-dark bg-opacity-25 rounded-pill">Create Task</h1>

                <!-- Task creation form -->
                <form method="POST" action="{{ route('task_01.store') }}" class="p-5">
                    @csrf

                    <div class="mb-2">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight foucus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="duration" class="block text-gray-700 text-sm font-bold mb-2">Duration</label>
                        <input type="text" name="duration" id="duration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight foucus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descriptoin</label>
                        <input type="text" name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight foucus:outline-non focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="value" class="bloak text-gray-700 text-sm font-bold mb-2">Value</label>
                        <input type="number" name="value" id="value" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-non focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="details" class="block text-gray-700 text-sm font-bold mb-2">Details</label>
                        <input type="text" name="details" id="details" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outliner-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="grade" class="block text-gray-700 text-sm font-bold mb-2">Grade</label>
                        <select name="grade" id="grade" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-non focus:shadow-outline" required>
                            <option value="select_grade">........ Select your Grade ........</option>
                            <option value="grade_a">Grade A</option>
                            <option value="grade_b">Grade B</option>
                            <option value="grade_c">Grade C</option>
                            <option value="grade_s">Grade S</option>
                            <option value="grade_f">Grade F</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="district" class="block text-gray-700 text-sm font-bold mb-2">District</label>
                        <select name="district" id="district" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-non focus:shadow-outline" required>
                            <option value="select_grade">........ Select your District ........</option>
                            <optgroup label="Western Province">
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kalutara">Kalutara</option>
                              </optgroup>

                              <optgroup label="Central Province">
                                <option value="Kandy">Kandy</option>
                                <option value="Matale">Matale</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                              </optgroup>

                              <optgroup label="Southern Province">
                                <option value="Galle">Galle</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Matara">Matara</option>
                              </optgroup>

                              <optgroup label="Northern Province">
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Vavuniya">Vavuniya</option>
                              </optgroup>

                              <optgroup label="Eastern Province">
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Trincomalee">Trincomalee</option>
                              </optgroup>

                              <optgroup label="North Western Province">
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Puttalam">Puttalam</option>
                              </optgroup>

                              <optgroup label="North Central Province">
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                              </optgroup>

                              <optgroup label="Uva Province">
                                <option value="Badulla">Badulla</option>
                                <option value="Monaragala">Monaragala</option>
                              </optgroup>

                              <optgroup label="Sabaragamuwa Province">
                                <option value="Kegalle">Kegalle</option>
                                <option value="Ratnapura">Ratnapura</option>
                              </optgroup>
                          </select>
                    </div>

                    <div class="mb-2">
                        <label for="class" class="block text-gray-700 text-sm font-bold mb-2">Class</label>
                        <input type="text" name="class" id="class" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="quality" class="block text-gray-700 text-sm font-bold mb-2">Quality</label>
                        <input type="text" name="quality" id="quality" class="shadow appearance-none border rounded w-full py-2 px-3 txet-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="task" class="block text-gray-700 text-sm fond-bold mb-2">Task</label>
                        <input type="text" name="task" id="task" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-non focus:shadow-outline" required                                     >
                    </div>

                    <div class="mb-2">
                        <label for="task" class="block text-gray-700 text-sm font-bold mb-2">Task:</label>
                        <input type="text" name="task" id="task" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="task" class="block text-gray-700 text-sm font-bold mb-2">Task</label>
                        <input type="text" name="task" id="task" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-2">
                        <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
                        <textarea name="message" id="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>

                    <div class="mb-2">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">Assign to:</label>
                        <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="" disabled selected>Select a user</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid gap-2 pt-2">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

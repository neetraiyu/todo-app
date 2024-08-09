<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EmployeeController extends Controller
{
    public function regadmin()
    {
        return view('auth.register-admin');
    }

    public function index()
    {
        $tasks = EmployeeModel::all();
        return view('admin.dashboard', ['tasks' => $tasks]);
    }

    public function create()
    {

        $users = User::where('usertype', '!=', 'admin')->get();
        return view('task_01.create', ['users' => $users]);
    }
    

    public function store(EmployeeFormRequest $request)
    {
        // // Include user_id in the validated data
        // $validatedData = $request->validated();
        // $validatedData['user_id'] = $request->user_id; // Get user_id from the form input
        // EmployeeModel::create($validatedData);
        // return redirect()->route('task_01.create')->with('success', 'Task created successfully!');

        $request->validate([
            'title' => 'required|string',
            'task' => 'required|string',
            'message' => 'required|string',
            'user_id' => 'required|integer',
            'status' => 'nullable|string', // Ensure status is included if needed
        ]);

        EmployeeModel::create([
            'title' => $request->input('title'),
            'task' => $request->input('task'),
            'message' => $request->input('message'),
            'user_id' => $request->input('user_id'),
            'status' => $request->input('status', 'pending'), // Default to 'pending' if not provided
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');

    }

    public function show()
    {
        $tasks = EmployeeModel::where('user_id', Auth::id())
        ->where('status', '!=', 'rejected')
        ->get();
        return view('task_view', ['tasks' => $tasks]);
    }

    public function edit($id)
    {
        $task = EmployeeModel::findOrFail($id);
        return view('edit_task', ['task' => $task]);
    }

    public function update(EmployeeFormRequest $request, $id)
    {
        $validatedData = $request->validated();
        $task = EmployeeModel::findOrFail($id);
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $task = EmployeeModel::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function accept($id)
    {
        $task = EmployeeModel::findOrFail($id);
        $task->update(['status' => 'processing']);
        return response()->json(['message' => 'Task accepted successfully!', 'status' => 'processing']);
    }

    public function complete($id)
    {
        $task = EmployeeModel::findOrFail($id);
        $task->update(['status' => 'completed']);
        return response()->json(['message' => 'Task completed successfully!', 'status' => 'completed']);
    }

    public function reject($id)
    {
        $task = EmployeeModel::findOrFail($id);
        // Check if the current user is the assigned user
        if ($task->user_id == Auth::id()) {
            $task->update(['status' => 'rejected']);
            return response()->json(['message' => 'Task rejected successfully!', 'status' => 'rejected']);
        }

        return response()->json(['message' => 'You are not authorized to reject this task.'], 403);
    }

    public function dismiss($id)
    {
        $task = EmployeeModel::findOrFail($id);
        $task->user_id = null; // or you can delete the task if that's the intended behavior
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'Task dismissed successfully!');
    }
}

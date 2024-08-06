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
        // Fetch all users for the user selection dropdown
        $users = User::where('usertype', '!=', 'admin')->get();
        return view('task_01.create', ['users' => $users]);
    }

    public function store(EmployeeFormRequest $request)
    {
        // Include user_id in the validated data
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user_id; // Get user_id from the form input
        EmployeeModel::create($validatedData);
        return redirect()->route('task_01.create')->with('success', 'Task created successfully!');
    }

    public function show()
    {
        $tasks = EmployeeModel::where('user_id', Auth::id())->get();
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
        $task->update(['status' => 'accepted']);
        return redirect()->route('tasks.index')->with('success', 'Task accepted successfully!');
    }

    public function reject($id)
    {
        $task = EmployeeModel::findOrFail($id);
        $task->update(['status' => 'rejected']);
        return redirect()->route('tasks.index')->with('success', 'Task rejected successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function regadmin(){
        return view('auth.register-admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('task_01.create');
    }

    public function store(EmployeeFormRequest $request)
    {
        $validatedData = $request->validated();
        EmployeeModel::create($validatedData);
        return redirect()->route('task_01.create')->with('success', 'Task created successfully!');
    }

    public function show()
    {
        $tasks = EmployeeModel::all();
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
}

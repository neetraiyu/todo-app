<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function create()
    {
        return view  ('task_01');
    }

    public function store(EmployeeFormRequest $request)
    {
        $validatedData = $request->validated();

        // Create a new employee task
        EmployeeModel::create($validatedData);

        // Redirect or respond as needed
        return redirect()->route('task_01.create')->with('success', 'Task created successfully!');
    }
}

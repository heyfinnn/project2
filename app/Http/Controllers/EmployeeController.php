<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.employees.index');
    }

    public function getEmployees()
    {
        $employees = employee::all();
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json($employee);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json('Employee deleted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        //
    }

}

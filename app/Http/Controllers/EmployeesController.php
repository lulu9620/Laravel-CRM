<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class EmployeesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $employee = new Employee();
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->phone = request('phone');
        if (request('company_id') !== "default") {
            $employee->company_id = request('company_id');
            $employee->save();
        }
        return redirect('/employees');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();

        return view('/employees.edit', [
            'employee' => $employee,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $employee = Employee::find($id);
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->phone = request('phone');
        $employee->company_id = request('company_id');
        $employee->save();

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect('/employees');
    }
}

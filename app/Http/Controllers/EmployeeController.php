<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstName' => 'required',
            'lastName'=>'required',
            'email'=>'required',
            'company'=>'required',
            'phone'=>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9'
        ]);

        $employee = new Employee;

        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->company_id = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->save();

        if($employee->save()){
            return redirect('/employee');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();

        return view('employee.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'firstName' => 'required',
            'lastName'=>'required',
            'email'=>'required',
            'company'=>'required',
            'phone'=>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9'
        ]);


        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->company_id = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->save();

        if($employee->save()){
            return redirect('/employee');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back();
    }
}

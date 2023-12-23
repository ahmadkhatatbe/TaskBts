<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   
    public function index(){
        $Employees=Employee::all();
        
   return view('employee.index')->with('Employees', $Employees);
      }
      public function show(){
        
       }
      public function create(){
        $Companies=Company::all();

       return view('employee.CreateEmployee')->with('Companies', $Companies);
      }
      public function store(EmployeeRequest $request)
   
      {   
        
         
         $data = Employee::create([
             'firstName' => $request->firstName,
             'lastName' => $request->lastName,
             'email' => $request->email,
             'phone' => $request->phone,
             'company_id' => $request->company_id,

         ]);
             $data->save();
         
         
        return redirect()->route('Employee.index');
      
      }
      public function edit($id){
         $Employee = Employee::find($id)->first();
         $Companies=Company::all();
         return view('employee.EditEmployee')->with('Employee', $Employee)->with('Companies', $Companies);
     }
     
     public function update(EmployeeRequest $request,$id)
     {
         
     
         Employee::where('id', $id)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id,
         ]);
     
         return redirect()->route('Employee.index');
     }
     
      public function destroy($id){
   
       $employee = Employee::find($id)->first();
       $employee->delete();
         
       return redirect()->route('Employee.index');
       
      }
}

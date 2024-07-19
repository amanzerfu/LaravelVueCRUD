<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments; 
use Illuminate\Support\Facades\Session;
class DepartmentController extends Controller
{
    public function deleteDepartments($id)
    {
        Departments::where('id',$id)->delete();
        return response()->json('success');
    } 
    public function updateDepartments(Request $request, $id) {
        Departments::where('id',$id)->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
           ]);
           return response()->json('success');
    }
public function getDepartments()
{
    return response()->json(Departments::latest()->get());
}

    public function storeDepartment(Request $request)
    {
        Departments::create([
            'user_id' =>1,
            'department_id' => $request->department_id,
            'name' => $request->name,
            
            
           ]);
        return response()->json('success');
    }
    //
    public function index(){
     $departments = Departments::all();
            return view('management.departments.index',compact('departments'));
    }
    public function create()
    {
        return view('management.departments.create');
    }
    public function store(Request $request)
    {
        $request ->validate([
            'name' =>['required'],
            'department_id' =>['required']
        ]);

       Departments::create([
        'user_id' =>1,
        'department_id' => $request->department_id,
        'name' => $request->name,
        
        
       ]);
       Session::flash('success-message','Department created succesfully!');
        return redirect()->route('departmentIndex');
    }
    public function edit($id)
    {
             $department = Departments::find($id);
    
            return view('management.departments.edit',compact('department'));
    }
    public function update(Request $request,$id)
    {
        $request ->validate([
            'name' =>['required'],
            'department_id' =>['required']
        ]);
        Departments::where('id',$id)->update([
            'department_id' => $request->director_id,
            'name' => $request->name,
           ]);
           Session::flash('success-message','Department edited succesfully!');
           return redirect() -> route('departmentIndex');
    }
    public function delete($id)
    {
        Departments::where('id',$id)->delete();
        Session::flash('success-message','Department Deleted succesfully!');
        return redirect() -> route('departmentIndex');
    }
}

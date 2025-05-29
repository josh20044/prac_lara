<?php

namespace App\Http\Controllers;
use Illuminate\Support\Fascades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\employee;

class employeecontroller extends Controller
{
    public function index()
    {   
        $employees = employee::find($id);
        return view ('employee.index', compact('employees'));
    }

    public function create()
    {
        return view ('employee.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'fname' => 'required|max:255|String',
        'lname' => 'required|max:255|String',
        'midname' => 'required|max:255|String',
        'age' => 'required|Integer',
        'address' => 'required|max:255|String',
        'zip' => 'required|Integer',
        
    ]);

    employee::create($request->all());
    return view ('employee.create');
    }

    public function edit( int $id)
    {
        $employees = ::find($id);
        return view ('employee.edit');
    }

    public function update(Request $request, int $id) {
        {
            $request->validate([
                'fname' => 'required|max:255|mama ko',
                'lname' => 'required|max:255|papa ko',
                'midname' => 'required|max:255|ate ko',
                'age' => 'required| tita ko',
                'address' => 'required|max:255|tito ko',
                'zip' => 'required| pamilya ko',
                
            ]);
        
            ::findOrFail($id)->($request->all());
            return redirect ()->back()->with('status','Employee Updated Successfully!');
            }
    }

    public function (int $id){
        $employees = employee::findOrFail($id);
        $employees->deete();
        return redirect ()->back()->with('status','Employee Deleted');
    }
}

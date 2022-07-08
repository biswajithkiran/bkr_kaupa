<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data           = Student::all();
        return view('students.list',['arrStudents'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('students.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $Request)
    {
        $validatedData  = $Request->validate(
                            [
                                'firstname'     => 'required',
                                'age'           => 'required',                                
                                'sex'           => 'required',
                                'phone_number'  => 'required',     
                                'emailid'       => 'required',
                            ],
                            [
                                'firstname.required'        => 'First Name is required',
                                'age.required'              => 'Age is required',                                
                                'sex.required'              => 'Gender is required',
                                'phone_number.required'     => 'Contact number is required',
                                'emailid.required'          => 'Email address is required',
                            ]);
        $student        = Student::create($Request->all());
        return redirect('/admin/students')->with('message', 'Data Saved Successfully!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $data           = Student::find($id);
        return view('students.edit',['arrStudent'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    
    public function update(UpdateStudentRequest $Request, $id)
    {
        $validatedData  = $Request->validate(
                            [
                                'firstname'     => 'required',
                                'age'           => 'required',                                
                                'sex'           => 'required',
                                'phone_number'  => 'required',     
                                'emailid'       => 'required',
                            ],
                            [
                                'firstname.required'        => 'First Name is required',
                                'age.required'              => 'Age is required',                                
                                'sex.required'              => 'Gender is required',
                                'phone_number.required'     => 'Contact number is required',
                                'emailid.required'          => 'Email address is required',
                            ]);
        $student                = Student::find($id);
        $student->firstname     = $Request->input('firstname');
        $student->lastname      = $Request->input('lastname');
        $student->age           = $Request->input('age');
        $student->sex           = $Request->input('sex');
        $student->emailid       = $Request->input('emailid');
        $student->phone_number  = $Request->input('phone_number');
        $student->update();
        return redirect('/admin/students')->with('message', 'Data Updated Successfully!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $Student=Student::find($id);
        if($Student)
        $Student->delete(); 
        return redirect('/admin/students')->with('message', 'Data Deleted Successfully!.');
    }

    public function students()
    {
        $data           = Student::all();
        return view('list',['arrStudents'=>$data]);
    }
}

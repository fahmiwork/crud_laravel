<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.data')->with([
            'students' => students::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {
        $validate = $request->validated();
        $students = new Students;
        $students->idstudents = $request->txtid;
        $students->fullname = $request->txtfullname;
        $students->gender = $request->txtgender;
        $students->address = $request->txtaddress;
        $students->emailaddress = $request->txtemail;
        $students->phone = $request->txtphone;
        $students->save();

        return redirect('students')->with('msg','Add new students successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students,$idstudents)
    {
       $data = $students->find($idstudents);
    //    echo $data->idstudents;
       return view('students.formedit')->with([
        'txtid' => $idstudents,
        'txtfullname' => $data->fullname,
        'txtaddress' => $data->address,
        'txtemail' => $data->emailaddress,
        'txtphone' => $data->phone,
        'txtgender' => $data->gender
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentsRequest $request, Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        $data->idstudents = $request->txtid;
        $data->fullname = $request->txtfullname;
        $data->gender = $request->txtgender;
        $data->address = $request->txtaddress;
        $data->emailaddress = $request->txtemail;
        $data->phone = $request->txtphone;
        $data->save();

        return redirect('students')->with('msg','Data dengan nama students '.$data->fullname. ' berhasil di update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students,$idstudents)
    {
        $data = $students->find($idstudents);
        $data->delete();
        return redirect('students')->with('msg','Data dengan nama students '.$data->fullname. ' berhasil di delete');
    }
}

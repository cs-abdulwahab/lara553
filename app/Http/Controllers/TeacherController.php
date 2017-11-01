<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\TeacherRequest;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Teacher[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {

        return Car::find(1)->Teacher()->get();


        // return Teacher::all();

        //  Teacher::all();
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        // var_dump($request->all());

         return Teacher::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher $teacher
     * @return Teacher
     */
    public function show(Teacher $teacher)
    {
        return $teacher;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}

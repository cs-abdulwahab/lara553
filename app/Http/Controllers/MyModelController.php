<?php

namespace App\Http\Controllers;

use App\MyModel;
use Illuminate\Http\Request;
use function Stringy\create;

class MyModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {

        // echo 'upload ';

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');

//        $name = time() . '.' . $image->getClientOriginalExtension();
//        $destinationPath = public_path('/images');

        // ensure every image has a different name
        $file_name = $request->file('image')->hashName();

        // echo $file_name;

        //request()->file('image')->store('avatars');


        return MyModel::create(['description' => $request->input('desc',''), 'profilepic' => $file_name]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MyModel $myModel
     * @return \Illuminate\Http\Response
     */
    public function show(MyModel $myModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MyModel $myModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MyModel $myModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\MyModel $myModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyModel $myModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MyModel $myModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyModel $myModel)
    {
        //
    }
}

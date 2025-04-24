<?php

namespace App\Http\Controllers;

use App\Models\Form;


use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos= Form::all();
        return view('AllInfo',['infos'=>$infos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data1 = $request->all();
        Form::create($data1);   
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd(Form::findOrFail($id));
        // $infos= Form::findOrFail($id);
        // return view('EditInfo',compact('infos'));
        //find or fail and compact is used for associative array.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        
    }
}

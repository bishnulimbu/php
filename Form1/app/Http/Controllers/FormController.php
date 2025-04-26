<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $infos= Form::all();
        return view('forms.index',compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:forms,email',
            'gender'=>'required',
        ]);
        Form::create($validatedData);   
        return redirect()->route('forms.index')->with('success','Form added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd(Form::findOrFail($id));
        //find or fail and compact is used for associative array.
        $data1 = Form::findOrFail($id);
        return view('forms.show',compact('data1'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data1 = Form::find($id);
        return view('forms.edit',compact('data1'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
        ]);
        $form->update($request->only(['first_name','last_name','email','gender']));
  return redirect()->route('forms.index')->with('success','Form updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)// using route model binding to automatically getch the from instance where id={form}
    {
        
        $form->delete();
        return redirect()->route('forms.index')->with('success','Form deleted successfully');
        
    }
}

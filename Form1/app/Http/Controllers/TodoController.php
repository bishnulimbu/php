<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos=Todo::all();
        return view('todos.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        // $data1 = request()->validate([
        //     'title'=>'required',
        //     'status'=>'required',
        // ]);
        $data1= $request->validated();
        // $order = Todo::max('order')+1;
        $data1['order'] = Todo::max('order')+1;
        // Todo::create([
        //     'title'=>$data1['title'],
        //     'status'=>$data1['status'],
        //     'order'=>$order,
        // ]);//using the request feature of laravel
        Todo::create($data1);
        return redirect()->route('todos.index')->with('success','Todo added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        // $todo= Todo::find($todo);unnecessary
        return view('todos.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        // $todo= Todo::find($todo);
        // dd($todo);
        return view('todos.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
        return redirect()->route('todos.index')->with('success','Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success','Todo deleted successfully');
    }
    public function updateStatus(Request $request,Todo $todo){
        $todo->status=$request->status;
        $todo->save();
        return response()->json(['message'=>'Status updated successfully']);
    }
}

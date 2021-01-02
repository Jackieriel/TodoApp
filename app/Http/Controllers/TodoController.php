<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todos = Todo::all()->paginate(5);
        $todos = Todo::orderByDesc('created_at')->paginate(5);


        return view('pages.index')->with('todos', $todos);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate the given request
         $todo = $this->validate($request, [
            'task' => 'required|string',
        ]);

        // create a new incomplete task with the given title
        $todo = new Todo([
            'task' => $request->get('task'),
        ]);

        $todo->save();
        // flash a success message to the session
        // session()->flash('status', 'Task Created!');

        // redirect to tasks index
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo, $id)
    {
        $todo = Todo::findOrFail($id);


        return view('pages.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo, $id)
    {
        $request->validate([
            'task'=>'string|required'
        ]);

        $todo = Todo::findOrFail($id);
        $todo->task = $request->task;

        $todo->save();

        return redirect()->route('todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->delete();
        return redirect()->back();
    } 
    
    // mark as completed
    public function completed($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->completed = 1;

        $todo->save();

        return redirect()->back();
    } 
    
    // mark as uncompleted
    public function uncompleted($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->completed = 0;

        $todo->save();

        return redirect()->back();
    }
}

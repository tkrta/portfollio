<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\User;
use Clowdinary;

class TodoController extends Controller
{
    public function create (Todo $todo)
    {
        return view('todos/create')->with(['todo'=> $todo->get()]);
    }
    
    public function store (Todo $todo, TodoRequest $request)
    {
        
        $input = $request['todo'];
        $input['user_id'] = auth()->id();
        $todo->fill($input)->save();
        return redirect('/todos/' . $todo->id);
    }
    
    public function show (Todo $todo)
    {
        
        return view('todos/show')-> with(['todo'=> $todo]);
    }
    
    public function did (Todo $todo, User $user)
    {
        $todo['progress'] += 1;
        $todo->save();
        return redirect('/todos/' . $todo->id);
    }
    
    public function back (Todo $todo)
    {
        $todo['progress'] -= 1;
        $todo->save();
        return redirect('/todos/' . $todo->id);
    }
    
    public function delete (Todo $todo)
    {
        $todo->delete();
        return redirect('/');
    }
    
}

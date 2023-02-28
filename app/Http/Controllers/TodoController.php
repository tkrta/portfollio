<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\User;
use Clowdinary;

class TodoController extends Controller
{
    
    public function show (Todo $todo, User $user)
    {
        if ($todo->lasttodo()) {
            return view('todos/show')-> with(['todo'=> $todo->lasttodo()]);
        }
    }
    
    public function store (Todo $todo, TodoRequest $request)
    {
        $input = $request['todo'];
        $input['user_id'] = auth()->id();
        $todo->fill($input)->save();
        return redirect('/todos/' . $todo->id);
    }
    
    public function newtodo (Todo $todo, User $user)
    {
        
        return view('todos/create')-> with(['todo'=> $todo]);
    }
    
    public function did (Todo $todo, User $user)
    {
        $user = auth()->user();
        $user['total_point'] += 1;
        $todo['progress'] += 1;
        $todo->save();
        $user->save();
        return redirect('/todos/' . $todo->id);
    }
    
    public function back (Todo $todo, User $user)
    {
        $user = auth()->user();
        $todo['progress'] -= 1;
        $user['total_point'] -= 1;
        $todo->save();
        $user->save();
        return redirect('/todos/' . $todo->id);
    }
    
    public function delete (Todo $todo)
    {
        $todo->delete();
        return redirect('/');
    }
    
}

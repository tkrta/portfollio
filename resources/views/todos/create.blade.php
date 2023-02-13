<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Todo</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <x-app-layout>
            <x-slot name="header">
                Todo
            </x-slot>
            <h1>{{ Auth::user()->name }} さん</h1>
            <h1>何を習慣化しますか？</h1>
            <form action="/todos"  method="POST">
                @csrf
                <div class="todo">
                    <input type="text" name="todo[todo]" placeholder="毎朝ジョギングをする" value="{{ old('todo.todo') }}"/>
                    <p class="title_error" style="color:red">{{ $errors->first('todo.todo') }}</p>
                </div>
                <input type="submit" value="store"/>
            </form>
        </x-app-layout>
    </body>
</html>
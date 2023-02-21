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
            <div class="h-screen text-3xl w-96 block mx-auto mt-44">
                <h1 class="text-center">{{ Auth::user()->name }} さん</h1>
                <h1 class="text-center">何を習慣化しますか？</h1>
                <form action="/todos"  method="POST" class="text-center my-12 h-36">
                    @csrf
                    <div>
                        <input class="w-96 h-24 text-2xl text-center" type="text" name="todo[todo]" placeholder="毎朝ジョギングをする" value="{{ old('todo.todo') }}"/>
                        <p class="title_error" style="color:red">{{ $errors->first('todo.todo') }}</p>
                    </div>
                    <input class="bg-blue-100 border rounded-md mt-5" type="submit" value="決めた！"/>
                </form>
                <div class="text-center">
                    <h2>前回の続きはこちらから↓</h2>
                    <a href="/todos/{{ $todo->lasttodo()->id }}" class="underline">・ {{ $todo->lasttodo()->todo }}</a>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
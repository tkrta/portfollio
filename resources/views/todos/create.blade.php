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
            <div class="h-screen w-1/2 block mx-auto mt-16">
                <div class="mt-8 border-2 bg-white rounded-2xl">
                    <div>
                        <h1 class="text-center block my-8 text-2xl">{{ Auth::user()->name }} さん</h1>
                        <h1 class="text-center text-2xl">何を習慣化しますか？</h1>
                        <form action="/todos"  method="POST" class="text-center my-12 h-36">
                            @csrf
                            <div>
                                <input class="w-96 h-24 text-2xl text-center" type="text" name="todo[todo]" placeholder="毎朝ジョギングをする" value="{{ old('todo.todo') }}"/>
                                <p class="block py-2 text-center text-red-500">{{ $errors->first('todo.todo') }}</p>
                            </div>
                            <input type="submit" value="決めた！" class="block h-9 w-32 py-1 my-4 mx-auto text-xl font-medium text-center border rounded-full text-white bg-blue-400 hover:border-slate-400"/>
                        </form>
                        @if($todo->lasttodo())
                        <div class="text-center text-2xl">
                            <h2>前回の続きはこちらから↓</h2>
                            <a href="/todos/{{ $todo->lasttodo()->id }}" class="underline block mb-4">・ {{ $todo->lasttodo()->todo }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
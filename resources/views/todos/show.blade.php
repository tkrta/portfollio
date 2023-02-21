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
        <div class="todos">
            <h1>{{ $todo->todo }}</h1>
            <form action="/todos/{{ $todo->id }}" method="POST">
                @csrf
                <button>できた</button>
            </form>
            <div class="w-72 grid grid-cols-6 gap-1 divide-x divide-y divide-slate-700 border-2">
                @for ($i = 0; $i < $todo->progress; $i++)
                     <img src="{{ $todo->stamp->image_path }}" width="50" height="50">
                @endfor
                   
               
                @for ($i = $todo->progress; $i < 30; $i++)
                    <div class="w-10 p-5" style="background-color:{{ $todo->card->color }};"></div>
                @endfor
            </div>
            <div class="back">
                <form action="/todos/{{ $todo->id }}" id="form_{{ $todo->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="button" onclick="backTodo({{ $todo->id }})">戻る</button>
                </form>
            </div>
            <div class="delete">
                <form action="/todos/{{ $todo->id }}" id="form_{{ $todo->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteTodo({{ $todo->id }})">削除</button>
                </form>
            </div>
            <div class="newtodo">
                @if ($todo->progress >= 30)
                    <form action="/todos">
                        <button>New Todo</button>
                    </form>    
                @endif
            </div>
        </div>
        
        <script>
            function backTodo(id) {
                'use strict'

                if (confirm('一日分戻りますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        
            function deleteTodo(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
        </x-app-layout>
    </body>
</html>
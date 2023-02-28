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
            <div class="h-screen w-2/3 block mx-auto mt-16">
                <div class="mt-8 divide-y-2 divide-gray-200">
                    <div class="bg-white border border-gray-200 border-2 rounded-2xl">
                        <h1 class="text-2xl my-6 text-center mx-auto">{{ $todo->todo }}</h1>
                        <form action="/todos/{{ $todo->id }}" method="POST">
                            @csrf
                            <button class="block h-9 w-20 py-1 my-4 mx-auto text-base font-medium text-center border rounded-full text-black bg-white hover:border-slate-400 hover:bg-blue-400 hover:text-white">できた</button>
                        </form>
                        <div class="w-96 grid grid-cols-6 gap-0 block border-2 divide-x divide-y divide-black mx-auto">
                                @for ($i = 0; $i < $todo->progress; $i++)
                                     <img src="{{ $todo->stamp->image_path }}" class="w-16 h-16">
                                @endfor
                                   
                               
                                @for ($i = $todo->progress; $i < 30; $i++)
                                    <div class="w-16 h-16" style="background-color:{{ $todo->card->color }};"></div>
                                @endfor
                        </div>
                        <div class="flex block my-4 ml-64">
                            <div>
                                <form action="/todos/{{ $todo->id }}/back" id="form1_{{ $todo->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="backTodo({{ $todo->id }})" class="block h-9 w-20 py-1 my-2 text-base font-medium text-center border rounded-full text-black bg-white hover:border-slate-400 hover:bg-green-400 hover:text-white">戻る</button>
                                </form>
                            </div>
                                
                            <div>    
                                <form action="/todos/{{ $todo->id }}" id="form_{{ $todo->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteTodo({{ $todo->id }})" class="block h-9 w-20 py-1 my-2 ml-64 text-base font-medium text-center border rounded-full text-black bg-white hover:border-slate-400 hover:bg-red-400 hover:text-white">削除</button>
                                </form>
                            </div>
                        </div>
                        <div class="newtodo">
                            @if ($todo->progress >= 30)
                                <form action="/">
                                    <button class="text-2xl my-6 text-center ml-20 underline"> < New Todo</button>
                                </form>    
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        
        <script>
            function backTodo(id) {
                'use strict'

                if (confirm('一日分戻りますか？')) {
                    document.getElementById(`form1_${id}`).submit();
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
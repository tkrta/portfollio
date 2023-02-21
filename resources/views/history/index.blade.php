<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>History</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>

    <body>
        <x-app-layout>
            <x-slot name="header">
                History
            </x-slot>
            @if ($histories->isNotEmpty())
                @foreach ($histories as $todo)
                    <div class="todos">
                        <h1>{{ $todo->todo }}</h1>
                        <div class="w-72 grid grid-cols-6 gap-4px divide-x divide-y divide-slate-700 border-2">
                            @for ($i = 0; $i < $todo->progress; $i++)
                                 <img src="{{ $todo->stamp->image_path }}" width="50" height="50">
                            @endfor
                               
                           
                            @for ($i = $todo->progress; $i < 30; $i++)
                                <div class="w-10 p-5" style="background-color:{{ $todo->card->color }};"></div>
                            @endfor
                        </div>
                    </div>
                @endforeach
            @else
                <h1>スタンプカードを埋めるとここに表示されます</h1>
            @endif
        </x-app-layout>
    </body>
</html>
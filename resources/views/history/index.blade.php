<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>履歴</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>

    <body>
        <x-app-layout>
            <x-slot name="header">
                履歴
            </x-slot>
            <div class="h-full w-full block mt-16">
                <div class="grid grid-cols-3 gap-2 mt-8 mx-auto bg-white">
                    @if ($histories->isNotEmpty())
                        @foreach ($histories as $todo)
                            <div class="bg-white border border-gray-200 border-2 rounded-2xl">
                                <div class="border-b-2 border-gray-200">
                                    <div class="block mx-auto my-5 w-72 grid grid-cols-6 gap-4px divide-2 divide-x divide-y border-2">
                                        @for ($i = 0; $i < $todo->progress; $i++)
                                             <img src="{{ $todo->stamp->image_path }}" width="50" height="50">
                                        @endfor
                                           
                                       
                                        @for ($i = $todo->progress; $i < 30; $i++)
                                            <div class="w-10 p-5" style="background-color:{{ $todo->card->color }};"></div>
                                        @endfor
                                    </div>
                                </div>
                                <h1 class="block mx-auto my-5 text-center text-2xl">{{ $todo->todo }}</h1>
                            </div>
                        @endforeach
                    @else
                        <h1>スタンプカードを埋めるとここに表示されます</h1>
                    @endif
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
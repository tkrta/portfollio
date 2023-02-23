<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Replies</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <a href= "/posts/{{ $post->id }}" class="block h-9 w-9 p-1 text-lg font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400">←</a>
            </x-slot>
            <div class="h-screen w-1/3 block mx-auto mt-16">
                <div class="mt-8 border border-gray-200 border-2 rounded-2xl divide-y-2 divide-gray-200 bg-white">
                    <div>
                        <h2 class="text-2xl ml-4 my-6">{{ Auth::user()->name }}</h2>
                        <h1 class= "text-2xl ml-8 underline mb-3">{{ $reply->title }}</h1>
                        <p class="text-xl ml-10">{{ $reply->body }}</p>
                        <a href='/posts/replies/{{ $post->id }}/{{ $reply->id }}/edit' class="ml-auto mb-2 block h-9 w-20 py-1 text-base font-medium text-center text-gray-700 border rounded-full hover:border-slate-400 hover:bg-purple-400 hover:text-white">edit</a>
                    </div>
                </div>
            </div>
            
        </x-app-layout>
    </body>
</html>
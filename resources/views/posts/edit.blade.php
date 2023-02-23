<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>編集</title>
    </head>
    
    <body>
        <x-app-layout>
            <x-slot name="header">
                <a href= "/posts/{{ $post->id }}" class="block h-9 w-9 p-1 text-lg font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400">←</a>
            </x-slot>
            <div class="h-screen w-1/3 block mx-auto mt-16">
                <div class="mt-8 border border-gray-200 border-2 rounded-2xl bg-white">
                    <form action= "/posts/{{ $post->id }}" method= "POST">
                        @csrf
                        @method('PUT')
                        <div class= "content_title">
                            <h2 class="my-6 ml-8 text-2xl">タイトル</h2>
                            <input type= 'text' name= 'post[title]' value= "{{ $post->title }}" class="block w-56 mx-auto text-center text-xl"/>
                        </div>
                        <div class= "content_body">
                            <h2 class="my-6 ml-8 text-2xl">本文</h2>
                            <input type= 'text' name= 'post[body]' value= "{{ $post->body }}" class="block w-56 mx-auto text-center text-xl h-12"/>
                        </div>
                        <input type= 'submit' value= "保存" class="ml-auto mt-5 mb-2 block h-9 w-20 py-1 text-base font-medium text-center text-white border rounded-full bg-purple-400 hover:border-slate-400"/>
                    </form>
                </div>
            </div>
            
        </x-app-layout>
    </body>
</html>
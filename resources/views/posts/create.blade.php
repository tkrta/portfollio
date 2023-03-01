<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿</title>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <a href= "/posts" class="block h-9 w-9 p-1 text-lg font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400">←</a>
            </x-slot>
            <div class="h-screen w-1/3 block mx-auto mt-16">
                <div class="mt-8 border border-gray-200 border-2 rounded-2xl bg-white">
                    <form action="/posts" method="POST">
                        @csrf
                        <div class="title">
                            <h2 class="my-6 ml-8 text-2xl">タイトル</h2>
                            <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}" class="block w-56 mx-auto text-center text-xl"/>
                            <p class="block py-2 text-center text-red-600">{{ $errors->first('post.title') }}</p>
                        </div>
                        <div class="body">
                            <h2 class="my-6 ml-8 text-2xl">本文</h2>
                            <textarea name="post[body]" placeholder="コメントを入力" class="block w-56 mx-auto text-center text-xl h-12">{{ old('post.body') }}</textarea>
                            <p class="block py-2 text-center text-red-600">{{ $errors->first('post.body') }}</p>
                        </div>
                        <input type="submit" value="投稿" class="ml-auto mt-5 mb-2 block h-9 w-20 py-1 text-base font-medium text-center text-white border rounded-full bg-blue-400 hover:border-slate-400"/>
                    </form>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
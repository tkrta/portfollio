<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>返信作成</title>
    </head>
    
    <body>
        <x-app-layout>
            <x-slot name="header">
                <a href= "/posts/{{ $post->id }}" class="block h-9 w-9 p-1 text-lg font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400">←</a>
            </x-slot>
            <div class="h-screen w-1/3 block mx-auto mt-16">
                <div class="mt-8 border border-gray-200 border-2 rounded-2xl bg-white">
                    <form action="/posts/replies/{{ $post->id }}" method="POST">
                        @csrf
                        <div class= "reply_title">
                            <h2 class="my-6 ml-8 text-2xl">Title</h2>
                            <input type="text" name="reply[title]" placeholder="タイトル" value="{{ old('reply.title') }}" class="block w-56 mx-auto text-center text-xl"/>
                            <p class="title_error" style="color:red">{{ $errors->first('reply.title') }}</p>
                        </div>
                        <div class= "reply_body">
                            <h2 class="my-6 ml-8 text-2xl">Body</h2>
                            <textarea name="reply[body]" placeholder="コメントを入力" class="block w-56 mx-auto text-center text-xl h-12">{{ old('reply.body') }}</textarea>
                            <p class="body_error" style="color:red">{{ $errors->first('reply.body') }}</p>
                        </div>
                        <input type="submit" value="Reply" class="ml-auto mt-5 mb-2 block h-9 w-20 py-1 text-base font-medium text-center text-white border rounded-full bg-green-400 hover:border-slate-400"/>
                    </form>
                </div>
            </div>
        
        </x-app-layout>
    </body>
</html>
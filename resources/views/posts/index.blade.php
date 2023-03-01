<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <a href= '/posts/create' class="block h-11 w-28 py-2 text-lg font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400 ml-auto">投稿</a>
            </x-slot>
            <div class="h-screen w-1/3 block mx-auto mt-16">
                <div class="mt-8 divide-y-2 divide-gray-200">
                    @foreach ($posts as $post)
                    <div class='bg-white border border-gray-200 border-2 rounded-2xl'>
                        <h3 class="text-2xl ml-4 my-6">{{ Auth::user()->name }}</h3>
                        <h2 class='text-2xl ml-8 underline mb-3'>
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <p class='text-xl ml-10'>{{ $post->body }}</p>
                        <div class="flex ml-4 mt-5 mb-2">
                                @if ($post->islikes())
                                    <form action={{ "/unlike/" . $post->id }}>
                                        <button type="submit" class="block h-9 w-20 py-1 mb-2 text-base font-medium text-center text-white border rounded-full bg-pink-400 hover:border-slate-400 hover:bg-white hover:text-black">いいね</button>
                                    </form>
                                @else
                                    <form action={{ "/like/" . $post->id }}>
                                        <button type="submit" class="block h-9 w-20 py-1 mb-2 text-base font-medium text-center border rounded-full hover:border-slate-400 hover:bg-pink-400 hover:text-white">いいね</button>
                                    </form>
                                @endif
                                <span class="block h-9 w-20 py-1 mb-2 text-base font-medium text-center ml-1">{{ $post->users->count() }}</span>
                                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" class="ml-auto">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $post->id }})" class="block h-9 w-20 py-1 mb-2 text-base font-medium text-center text-gray-700 border rounded-full hover:border-slate-400 hover:bg-red-400 hover:text-white">削除</button> 
                                </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class='paginate'>
                    {{ $posts-> links() }}
                </div>
            </div>
            
            <script>
                function deletePost(id) {
                    'use strict'
    
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        
        </x-app-layout>
    </body>
</html>
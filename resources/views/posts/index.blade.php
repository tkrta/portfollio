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
                <div class="mt-8 border border-gray-200 border-2 rounded-2xl divide-y-2 divide-gray-200">
                    @foreach ($posts as $post)
                    <div class='post'>
                        <h3 class="text-2xl ml-4 my-6">{{ Auth::user()->name }}</h3>
                        <h2 class='text-2xl ml-8 underline mb-3'>
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <p class='text-xl ml-10'>{{ $post->body }}</p>
                        <div class="flex ml-4 mt-5 mb-2">
                                @if ($post->islikes())
                                    <form action={{ "/unlike/" . $post->id }}>
                                        <button>
                                            <img src="https://res.cloudinary.com/dmjq6lz1y/image/upload/v1676816200/portfolio/heart_1_grk1z3.tiff" alt="いいね解除" class="h-6 w-6"/>
                                        </button>
                                    </form>
                                @else
                                    <form action={{ "/like/" . $post->id }}>
                                        <button>
                                            <img src="https://res.cloudinary.com/dmjq6lz1y/image/upload/v1676816216/portfolio/heart_2_jrnevc.tiff" alt="いいね" class="h-6 w-6"/>
                                        </button>
                                    </form>
                                @endif
                                <span class="ml-1">{{ $post->users->count() }}</span>
                                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" class="ml-auto">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $post->id }})" class="block h-9 w-20 py-1 text-base font-medium text-center text-gray-700 border rounded-full hover:border-slate-400 hover:bg-red-400 hover:text-white">削除</button> 
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
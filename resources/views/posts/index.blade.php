<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                Post Index
            </x-slot>
            <h1>Blog Name</h1>
            <a href= '/posts/create'>create</a>
            <div class='posts'>
                @foreach ($posts as $post)
                <div class='post'>
                    <h3 class="username">{{ $user->name }}</h3>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">
                        {{ $post->title }}
                        </a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                        @if ($post->islikes())
                            <form action={{ "/unlike/" . $post->id }}>
                                <button>いいね解除</button>
                            </form>
                        @else
                            <form action={{ "/like/" . $post->id }}>
                                <button>いいね</button>
                            </form>
                        @endif
                        <span>{{ $post->users->count() }}</span>
                </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $posts-> links() }}
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
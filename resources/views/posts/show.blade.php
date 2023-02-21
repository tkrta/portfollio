<!DOCTYPE HTML>
<html lang= "{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset= "utf-8">
        <meta name= "viewport" content= "width= device-width, initial= 1">
        <title>詳細</title>
        <!--Fonts-->
        <link href= "https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <x-app-layout>
            <x-slot name="header">
                <a href= "/posts" class="block h-9 w-9 p-1 text-lg font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400">←</a>
            </x-slot>
            <div class="h-screen w-1/3 block mx-auto mt-16">
                <div class="mt-8 border border-gray-200 border-2 rounded-2xl divide-y-2 divide-gray-200">
                    <div class="post">
                        <div class="flex ml-4 my-6">
                            <h2 class="text-2xl">{{ Auth::user()->name }}</h2>
                            <a href= "/posts/{{ $post->id }}/edit" class="ml-auto block h-9 w-20 py-1 text-base font-medium text-center text-gray-700 border rounded-full hover:border-slate-400 hover:bg-purple-400 hover:text-white">edit</a>
                        </div>
                        <h1 class= "text-2xl ml-8 underline mb-3">{{ $post->title }}</h1>
                        <p class="text-xl ml-10">{{ $post->body }}</p>
                        <a href= "/posts/replies/{{ $post->id }}/create" class="block ml-4 mt-5 mb-2 h-9 w-20 py-1 text-base font-medium text-center text-white border rounded-full hover:border-slate-400 bg-green-400">Reply</a>
                    </div>
                    <div class= "replies">
                        @foreach ($replies as $reply)
                            <div class= "reply">
                                <h5 class="text-2xl ml-4 my-6">{{ Auth::user()->name }}</h5>
                                <a href= '/posts/replies/{{ $post->id }}/{{ $reply->id }}'>
                                    <h4 class= "text-2xl ml-8 underline mb-3">{{ $reply->title }}</h4>
                                </a>
                                <p class= "text-xl ml-10">{{ $reply->body }}</p>  
                                <form action='/posts/replies/{{ $post->id }}/{{ $reply->id }}' id="form_{{ $reply->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteReply({{ $reply->id }})" class="ml-auto mt-5 mb-2 block h-9 w-20 py-1 text-base font-medium text-center text-gray-700 border rounded-full hover:border-slate-400 hover:bg-red-400 hover:text-white">削除</button> 
                                </form>
                            </div>
                            <div class='paginate'>
                                {{ $replies->links() }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <script>
                function deleteReply(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        
        </x-app-layout>    
    </body>
</html>    
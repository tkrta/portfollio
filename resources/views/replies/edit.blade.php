<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Reply</title>
    </head>
    
    <body>
        <h1 class= "reply_title">編集</h1>
        <div class= "reply_content">
            <form action= "/posts/replies/{{ $post->id }}/{{ $reply->id }}" method= "POST">
                @csrf
                @method('PUT')
                <div class= "content_title">
                    <h2>タイトル</h2>
                    <input type= 'text' name= 'reply[title]' value= "{{ $reply->title }}"/>
                </div>
                <div class= "content_body">
                    <h2>本文</h2>
                    <input type= 'text' name= 'reply[body]' value= "{{ $reply->body }}"/>
                </div>
                <input type= 'submit' value= "保存"/>
            </form>
        </div>
    </body>
</html>
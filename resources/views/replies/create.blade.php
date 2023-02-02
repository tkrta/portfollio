<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>返信作成フォーム</title>
    </head>
    
    <body>
        <h1>返信　タイトル</h1>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            <div class= "reply_title">
                <h2>Title</h2>
                <input type="text" name="reply[title]" placeholder="タイトル" value="{{ old('reply.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('reply.title') }}</p>
            </div>
            <div class= "reply_body">
                <h2>Body</h2>
                <textarea name="reply[body]" placeholder="コメントを入力">{{ old('reply.body') }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('reply.body') }}</p>
            </div>
            <input type= "submit" value= "store"/>
    </body>
</html>
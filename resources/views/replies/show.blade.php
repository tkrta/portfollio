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
        <h1 class="reply_title">
            {{ $reply->title }}
        </h1>
        <div class="reply_content">
            <div class="content_reply">
                <h3>本文</h3>
                <p>{{ $reply->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/posts/{{ $post->id }}">戻る</a>
        </div>
    </body>
</html>
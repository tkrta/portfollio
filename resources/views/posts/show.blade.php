<!DOCTYPE HTML>
<html lang= "{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset= "utf-8">
        <meta name= "viewport" content= "width= device-width, initial= 1">
        <title>Post</title>
        <!--Fonts-->
        <link href= "https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1 class= "title">
            {{ $post->title }}
        </h1>
        <div class= "content">
            <div class= "content_post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
            </div>
        </div>
        <div class= "edit">
            <a href= "/posts/{{ $post->id }}/edit">edit</a>
        </div>
        <a href= '/posts/{{ $post->id }}/create'>reply</a>
        <div class= "replies">
            @foreach ($replies as $reply)
                <div class= "reply">
                    <a href= "/posts/{{ $post->id }}/{{ $reply->id }}">
                        <h4 class= "reply_title">{{ $reply->title }}</h4>
                    </a>
                    <p class= "reply_body">{{ $reply->body}}</p>    
                </div>
                <div class='paginate'>
                    {{ $replies->links() }}
                </div>
            @endforeach
        </div>
        <div class= "footer">
            <a href= "/posts">戻る</a>
        </div>
    </body>
    
</html>    
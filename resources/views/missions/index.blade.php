<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Mission</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>

    <body>
        <x-app-layout>
            <x-slot name="header">
                Mission
            </x-slot>
            <div class="missions">
                <div class="mission1">
                    <h2>30日間続けよう</h2>
                       
                        <form action="/missions/{{ $user->id }}" method="POST">
                            @method("PUT")
                            @csrf
                            <button>GET</button>
                        </form>
                    
                </div>
            </div>
        </x-app-layout>
    </body>

</html>
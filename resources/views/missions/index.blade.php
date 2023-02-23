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
            <div class="h-screen w-1/2 block mx-auto mt-16">
                <div class="mt-8">
                    <div class="bg-white border border-gray-200 border-2 rounded-2xl divide-y-2 divide-gray-200">
                        <div>
                        <div class="flex block my-6 ml-6">
                            <h2 class="block text-2xl py-3">ログインしよう</h2>
                            <div class="block ml-auto pr-2">
                                <p class="text-xl text-center">10 p</p>
                                @if ($missions->loggedin())   
                                    <form action="/missions" method="POST">
                                        @method("PUT")
                                        @csrf
                                        <button class="block h-9 w-20 py-1 text-base font-medium text-center text-white border rounded-full hover:border-slate-400 bg-red-400">GET</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div>
                        <div class="flex block my-6 ml-6">
                            <h2 class="block text-2xl py-3">30日間続けよう</h2>
                            <div class="block ml-auto pr-2">
                                <p class="text-xl text-center">10 p</p>
                                @if ($missions->progressed())   
                                    <form action="/missions" method="POST">
                                        @method("PUT")
                                        @csrf
                                        <button class="block h-9 w-20 py-1 text-base font-medium text-center text-white border rounded-full hover:border-slate-400 bg-red-400">GET</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div>
                        <div class="flex block my-6 ml-6">
                            <h2 class="block text-2xl py-3">1回投稿しよう</h2>
                            <div class="block ml-auto pr-2">
                                <p class="text-xl text-center">10 p</p>
                                @if ($missions->postcounts())   
                                    <form action="/missions" method="POST">
                                        @method("PUT")
                                        @csrf
                                        <button class="block h-9 w-20 py-1 text-base font-medium text-center text-white border rounded-full hover:border-slate-400 bg-red-400">GET</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </body>

</html>
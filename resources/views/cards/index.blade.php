<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Cards</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <x-app-layout>
            <x-slot name="header">
                <div class="flex">
                    <h1 class="block h-11 w-28 py-2 text-lg font-semibold text-center">Card Shop</h1>
                    <a class="block h-11 w-28 py-2 text-lg font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400 ml-auto" href="/stamps">Stamp Shop<a>
                </div>
            </x-slot>
            <div class="h-screen block mt-4 bg-white">
                <h3 class="block w-1/4 mt-4 ml-auto pr-2 pt-4 text-right text-xl underline">{{ Auth::user()->total_point }} p</h3>
                <div class="grid grid-cols-3 gap-2 p-8">
                    @foreach ($cards as $card)
                    <div class='bg-white border border-gray-200 border-2 rounded-2xl'>
                        <div class="border-b-2 border-gray-200">
                            <div style="background-color:{{ $card->color }}" class="w-40 h-40 block my-4 mx-auto"></div>
                        </div>
                        <div class="border-b-2  border-gray-200">
                            <p class="block p-2 text-right" name="card[price]">{{ $card->price }} p</p>
                        </div>
                        <div class="button">
                            @if ($card->setting())
                                <div class="hover:bg-gray-300">
                                    <p class="block h-10 w-44 py-1 font-semibold text-center mx-auto my-1">適用中</p>
                                </div>
                            @else
                                @if ($card->isBought())
                                    <form action="/cards/{{ $card->id }}"　method="POST">
                                        @method("PUT")
                                        @csrf
                                        <button class="block h-10 w-32 py-1 font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-green-400 mx-auto my-1">変更</button>
                                    </form>
                                @else 
                                    @if ($card->canBuy())
                                        <form action="/cards/{{ $card->id }}" method="POST">
                                            @csrf
                                            <button class="block h-10 w-32 py-1 font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400 mx-auto my-1">購入</button>
                                        </form>
                                    @else 
                                        <p class="block h-10 w-44 py-1 font-semibold text-center mx-auto my-1">ポイントが足りません</p>
                                    @endif 
                                   
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </x-app-layout>
    </body>
</html>
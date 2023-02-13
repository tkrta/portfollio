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
                Card Shop
                <a href="/stamps">Stamp Shopへ<a>
            </x-slot>
            @foreach ($cards as $card)
            <div class="cards">
                <div style="background-color:{{ $card->color }}" class="w-1/6 py-10"></div>
                <p name="card[price]">{{ $card->price }} p</p>
                <div class="button">
                    @if ($card->isBought())
                        <form action="/cards/{{ $card->id }}"　method="POST">
                            @method("PUT")
                            @csrf
                            <button>変更</button>
                        </form>
                    @else 
                        @if ($card->canBuy())
                            <form action="/cards/{{ $card->id }}" method="POST">
                                @csrf
                                <button>購入</button>
                            </form>
                        @else 
                            <p>ポイントが足りません</p>
                        @endif 
                       
                    @endif
                </div>
            </div>
            @endforeach
            
        </x-app-layout>
    </body>
</html>
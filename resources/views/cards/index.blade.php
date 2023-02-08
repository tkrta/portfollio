<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Cards</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1>Card Shop</h1>
        <h2 class="shop_menu">
            <a href="/stamps">stamps</a>
            <a href="/cards">carads</a>    
        </h2>
        @foreach ($cards as $card)
        <div class="cards">
            <p style="color:{{ $card->color }}">test</p>
            <canvas id="square" onload="square()" width="100" height="100"></canvas>
            <p name="card[price]">{{ $card->price }} p</p>
            @if ($card->isBought())
                <form>
                    @csrf
                    <button>変更</button>
                </form>
            @else 
                @if ($card->canBuy())
                    <form>
                        <button>購入</button>
                    </form>
                @else 
                    <p>ポイントが足りません</p>
                @endif 
               
            @endif
        </div>
        @endforeach
        
        @foreach ($cards as $card)
        <script>
                onload = function square() {
                    'use strict'
                    
                    var canvas = document.getElementById("square");
                    var ctx = canvas.getContext("2d");
                    ctx.beginPath();
                    ctx.fillStyle = '{{ $card->color }}';
                    ctx.fillRect(0,0,100,100);
                }
        </script>
        @endforeach
    </body>
</html>
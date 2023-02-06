<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stamps</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1>SHOP</h1>
        <h2 class="shop_menu">
            <a href="/stamps">stamps</a>
            <a href="/carads">carads</a>    
        </h2>
        @foreach ($stamps as $stamp)
        <div class="stamps">
            <img src="{{ $stamp->image_path }}" alt="画像が読み込めません。" name="stamp[image_path]" width="200" height="200"/>
            <p name="stamp[name]">{{ $stamp->name }}</p>
            <p name="stamp[price]">{{ $stamp->price }} p</p>
            @if ($stamp->isBought())
                <form>
                    @csrf
                    <button>変更</button>
                </form>
            @else 
                @if ($stamp->canBuy())
                    <form>
                        <button>購入</button>
                    </form>
                @else 
                    <p>ポイントが足りません</p>
                @endif 
               
            @endif
        </div>
        @endforeach
    </body>
    
</html>
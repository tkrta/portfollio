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
        <x-app-layout>
            <x-slot name="header">
                <div class="flex">
                    <h1 class="block h-11 w-28 py-2 text-lg font-semibold text-center">Stamp Shop</h1>
                    <a href="/cards" class="block h-11 w-28 py-2 text-lg font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400 ml-auto">Card Shop</a>
                </div>
            </x-slot>
            <div class="h-full w-full block mt-16">
                <div class="grid grid-cols-3 gap-2 mt-8 mx-auto bg-white">
                    @foreach ($stamps as $stamp)
                    <div class='bg-white border border-gray-200 border-2 rounded-2xl'>
                        <div class="border-b-2 border-gray-200">
                            <img class="w-40 h-40 block my-4 mx-auto" src="{{ $stamp->image_path }}" alt="画像が読み込めません。" name="stamp[image_path]"/>
                        </div>
                        <div class="border-b-2  border-gray-200">
                            <div class="flex block ml-2 p-2">
                                <p class="block" name="stamp[name]">{{ $stamp->name }}</p>
                                <p class="block ml-auto" name="stamp[price]">{{ $stamp->price }} p</p>
                            </div>
                        </div>
                        @if ($stamp->isBought())
                            <form action="/stamps/{{ $stamp->id }}" method="POST">
                                @method("PUT")
                                @csrf
                                <button class="block h-10 w-32 py-1 font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-green-400 mx-auto my-1">変更</button>
                            </form>
                        @else 
                            @if ($stamp->canBuy())
                                <form action="/stamps/{{ $stamp->id }}" method="POST">
                                    @csrf
                                    <button class="block h-10 w-32 py-1 font-semibold text-center text-white border rounded-full hover:border-slate-400 bg-blue-400 mx-auto my-1">購入</button>
                                </form>
                            @else
                                <div class="hover:bg-gray-300">
                                    <p class="block h-10 w-44 py-1 font-semibold text-center mx-auto my-1">ポイントが足りません</p>
                                </div>
                            @endif 
                           
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            
        </x-app-layout>
    </body>
    
</html>
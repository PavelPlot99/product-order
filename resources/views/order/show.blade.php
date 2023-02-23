<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Продукты') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Номер телефона {{ $order->phone}}</h3>
                    <h3>Email {{ $order->email}}</h3>
                    <h3>Адрес {{ $order->address}}</h3>
                    <h3>Пользователь {{ $order->user->name}}</h3>
                    <h3>Сумма {{ $order->amount}} р</h3>
                    <h1>Список товаров:</h1>
                    <hr>
                    @foreach($order->products as $product)
                        <h4>Название {{$product->title}}</h4>
                        <h4>Цена {{$product->price}} р</h4>
                        <h4>Количество {{$product->pivot->count}} р</h4>
                        <hr>
                    @endforeach
                    <input id="address" type="hidden" value="{{$order->address}}">
                </div>
                <div class="map" id="map" style="width: 400px; height: 400px">

                </div>
            </div>

        </div>
    </div>
    <script src="{{asset('scripts/detailMap.js')}}" type="module"></script>

</x-app-layout>

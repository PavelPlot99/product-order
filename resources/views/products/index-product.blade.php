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
                    {{ __("Список товаров") }}
                    <a href="{{route('product.create')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Создать товар
                    </button></a>
                    <div>

                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 :bg-gray-700 :text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Название товара
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Цена
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($products) > 0)
                            @foreach($products as $product)
                            <tr class="bg-white border-b :bg-gray-800 :border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                                    {{$product->title}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$product->price}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('product.change', ['product' => $product->id])}}">Изменить</a>
                                    <a href="{{route('product.delete', ['product' => $product->id])}}">Удалить</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <th colspan="3">Нет товаров</th>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

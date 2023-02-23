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
                    {{ __("Заказы") }}
                    <a href="">
                        <a href="{{route('order.create')}}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Создать
                            </button>
                        </a>
                    </a>
                    <div>

                    </div>
                    <br>
                    <table id="indexOrder">
                        <thead>
                        <tr>
                            <th scope="col">
                                Дата
                            </th>
                            <th scope="col">
                                Номер телефона
                            </th>
                            <th scope="col">
                                E-mail
                            </th>
                            <th scope="col">
                                Адрес
                            </th>
                            <th scope="col">
                                Действия
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="bg-white border-b :bg-gray-800 :border-gray-700">
                                <td>
                                    {{$order->date}}
                                </td>
                                <td>
                                    {{$order->phone}}
                                </td>
                                <td>
                                    {{$order->email}}
                                </td>
                                <td>
                                    {{$order->address}}
                                </td>
                                <td>
                                    <a href="">Удалить</a>
                                    <a href="{{route('order.show', ['order' => $order->id])}}">Посмотреть</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$orders->links()}}
                </div>
            </div>

        </div>
    </div>
    <script src="{{asset('scripts/datatable.js')}}" type="module"></script>
</x-app-layout>

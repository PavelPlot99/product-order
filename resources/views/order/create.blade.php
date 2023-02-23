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
                    {{ __("Создание заказа") }}
                    <div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <form class="w-full max-w-sm" action="{{route('order.store')}}" method="POST">
                            @csrf
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="inline-full-name">
                                        Дата
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-full-name" type="date" name="order[date]">
                                    <x-input-error :messages="$errors->get('order.date')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="inline-full-name">
                                        Номер телефона
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="phoneInput" type="text" step="0.01" name="order[phone]">
                                    <x-input-error :messages="$errors->get('order.phone')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="inline-full-name">
                                        E-mail
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        readonly="readonly" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" type="text"
                                        step="0.01" name="order[email]">
                                    <x-input-error :messages="$errors->get('order.email')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="inline-full-name">
                                        Адрес
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="address" type="text" name="order[address]">
                                    <x-input-error :messages="$errors->get('order.address')" class="mt-2"/>
                                </div>
                            </div>


                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                       for="products">
                                    Состав Заказа
                                </label>
                            </div>

                            <div id="dynamic" data-selector="0">

                                <div class="md:flex md:items-center mb-6">
                                    <select id="select" oninput="getAmount()" name="products[0]">
                                        @foreach($products as $product)
                                            <option data-price="{{$product->price}}" value="{{$product->id}}">{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" id="count" oninput="getAmount()" name="count[0]"/>
                                    <x-input-error :messages="$errors->get('order.address')" class="mt-2"/>
                                </div>

                            </div>
                            <span class="del_b" style="cursor: pointer; font-size: 30px">-</span>
                            <span class="add_b" style="cursor: pointer; font-size: 30px">+</span>

                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                           for="inline-full-name">
                                        Сумма
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="amount" readonly="readonly"  type="nubmer" name="order[amount]">
                                    <x-input-error :messages="$errors->get('order.amount')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="md:flex md:items-center">
                                <div class="md:w-1/3"></div>
                                <div class="md:w-2/3">
                                    <input
                                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        type="submit"
                                        value="Создать"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="map" style="width: 480px; height: 400px"></div>
            </div>
        </div>
    </div>
    <script src="{{asset('scripts/mask.js')}}" type="module"></script>
    <script src="{{asset('scripts/dynamicFields.js')}}" type="module"></script>
    <script>
        function getAmount()
        {
            let selects = document.querySelectorAll('select[id="select"]')
            let inputs = document.querySelectorAll('input[id="count"]')
            let selectValues = []
            let inputValues = []

            selects.forEach((select, key) => {
                selectValues.push(parseFloat(select.options[select.selectedIndex].getAttribute('data-price')))
                inputValues.push(inputs[key].value == "" ? 0 : parseInt(inputs[key].value))
            })

            let result = 0;
            selectValues.forEach((value,key) => {
                result += value * inputValues[key];
            })
            document.getElementById('amount').value = result.toFixed(2);
        }
    </script>
        <script src="{{asset('scripts/ya.js')}}" type="module"></script>
</x-app-layout>
{{dd($errors)}}

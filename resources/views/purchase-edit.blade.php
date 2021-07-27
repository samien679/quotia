<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Hankintakulut') }}
        </h2>
    </x-slot>

<x-slot name="info">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
             {{ __('Yhteensä 178,80 € alv 0%') }}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-lg bg-white border-b border-gray-200">
                    Lisää tarjottavan työn toteutuessa toteutuvat henkilöstö -ja materiaalikustannukset. Erittele ainakin työtunnit ja materiaalit omille riveilleen. 
                </div>

                <div class="p-6 mt-6 bg-white border-b border-gray-200 ">
                    
                    <!-- Lähetä lomake tallennettavaksi tietokantaan -->
                    <form method="POST" action="{{ route('purchase_items.store') }}">
                        @csrf
                        <div class="flex flex-wrap justify-start ">

                        <!-- Lisättävän kulun tuotekoodi -->
                        <div>
                            <x-label for="product_number" :value="__('Tuotekoodi')" />
            
                            <x-input id="product_number" class="flex mt-1" type="text" name="product_number" :value="old('product_number')" autofocus />
                        </div>
                        
                        <!-- Lisättävän kulun nimike 1 -->
                        <div>
                            <x-label for="name1" :value="__('Nimike 1')" />
            
                            <x-input id="name1" class="flex mt-1" type="text" name="name1" :value="old('name1')" />
                        </div>

                        <!-- Lisättävän kulun nimike 2 -->
                        <div>
                            <x-label for="name2" :value="__('Nimike 2')" />
            
                            <x-input id="name2" class="flex mt-1" type="text" name="name2" :value="old('name2')" />
                        </div>

                        <!-- Lisättävä määrä -->
                        <div>
                            <x-label for="qty" :value="__('Määrä')" />
            
                            <x-input id="qty" class="flex mt-1" type="number" name="qty" :value="old('qty')" />
                        </div>

                        <!-- Yksikkö -->
                        <div>
                            <x-label for="unit" :value="__('Yksikkö')" />
            
                            <x-input id="unit" class="flex mt-1" type="text" name="unit" :value="old('unit')" required />
                        </div>

                        <!-- Hankintahinta / yksikkö -->
                        <div>
                            <x-label for="purchase_price" :value="__('Kulu € / yksikkö')" />
            
                            <x-input id="purchase_price" class="flex mt-1" type="number" name="purchase_price" :value="old('purchase_price')" />
                        </div>

                        <!-- Tukkuri -->
                        <div>
                            <x-label for="supplier" :value="__('Toimittaja')" />
            
                            <x-input id="supplier" class="flex mt-1" type="text" name="supplier" :value="old('supplier')" />
                        </div>

                        <!-- Add item button -->
                        <x-quotia.add-item></x-quotia.add-item>

                    </div>
                    </form>


                    </div>
                    <div class="pt-12">
                     <table class="w-full text-right bg-green-200 border-collapse border-green-600 table-auto">
                        <thead>
                          <tr class="font-bold text-gray-800">        
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Tuotekoodi</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Nimike 1</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Nimike 2</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Määrä</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Kulu € / á</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Kulu € / rivi</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Tukkuri</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right"></th>

                          </tr>
                        </thead>
                        <tbody>
                            
                        @foreach ($purchaseItems as $purchaseItem)
                            
                          <tr>
                            <td class="py-1 pr-2 border border-green-600">{{ $purchaseItem->product_number }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $purchaseItem->name1 }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $purchaseItem->name2 }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $purchaseItem->qty }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $purchaseItem->unit }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $purchaseItem->purchase_price }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $purchaseItem->supplier }}</td>
                            <td class="text-center py-1 pr-2  border border-green-600">
                                <i class="text-red-500 fa fa-trash"></i>
                            </td>
                          </tr>
                          
                        @endforeach

                        </tbody>
                      </table>

                        <!-- Advance -button -->
                        <div class="mt-7">
                            Kun olet syöttänyt kulut taulukkoon siirry seuraavaan vaiheeseen valitsemalla
                            <x-quotia.button class="ml-2">
                                {{ __('Jatka') }}
                            </x-quotia.button>
                        </div>

                    </div>
                    </div>   
                </div>
            </div>
        </div>
</x-app-layout>

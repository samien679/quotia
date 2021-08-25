<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tarjous #') }}{{ session('activequote') }}
        </h2>
    </x-slot>

<x-slot name="info">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Yhteensä: ') }}<strong>{{ $sumOfQuote }}</strong>{{ __('€ alv0%') }}
    </x-slot>

<x-slot name="info2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Yhteensä: ') }}<strong>{{ $sumOfQuote }}</strong>{{ __('€ alv0%') }}
    </x-slot>

    <div class="mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <!-- Taulukko jossa syötetyt rivit -->
                    <div>
                        <table class="w-full text-right bg-green-200 border-collapse border-green-600 table-auto shadow-md">
                           <thead>
                            <tr class="font-bold text-gray-800">        
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Tuotekoodi</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Nimike</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Määrä</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Ostohinta á</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Myyntihinta á / rivi</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Riviarvo</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Kate</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Vero</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-center">Muokkaa</th>

   
                            </tr>
                        </thead>
                        <tbody>
                               
                           @foreach ($quoteItems as $quoteItem)
                               
                            <tr class="pt-3">
                            <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->product_number }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->name1 }}{{ $quoteItem->name2 }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->qty }} {{ $quoteItem->unit }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->purchase_price }}{{ __(' €') }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->quote_price }} | {{ $quoteItem->item_value }}{{ __(' €') }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->vat }}{{ __(' %') }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->sales_margin_percentage }}{{ __('%  ') }}{{ $quoteItem->sales_margin }}{{ __('€') }}</td>
                            <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->vat }}{{ __(' %') }}</td>
                            <td class="text-center py-1 pr-2  border border-green-600">
                                <div class="flex flex-row justify-around">

                                   <!-- Lomake rivin poistamiseksi -->
                                   <form method="POST" action="{{ route('quote_items.destroy', $quoteItem->id) }}">
                                   @csrf
                                   <input type="hidden" name="_method" value="DELETE">
                                   <button type="submit" class="text-red-600 fa fa-trash"></button>
                                   </form>
                                </div>
                               </td>
                             </tr>
                             
                             
                           @endforeach
   
                           </tbody>
                         </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Lisää tarjoukselle haluamasi rivit ja määrittele niille hinnoittelu.

                <!-- Lomake uuden tarjousrivin lisäämiseksi tietokantaan -->
                    <form method="POST" action="{{ route('quote_items.store') }}">
                        @csrf
                        <div class="flex flex-wrap justify-start border rounded-lg shadow-sm p-3 mt-4">

                        <!-- Lisättävän rivin tuotekoodi -->
                        <div>
                            <x-label for="product_number" :value="__('Tuotekoodi')" />
                            <x-input id="product_number" class="flex mt-1" type="text" name="product_number" :value="old('product_number')" autofocus />
                        </div>
                        
                        <!-- Lisättävän rivin nimike 1 -->
                        <div>
                            <x-label for="name1" :value="__('Nimike 1')" />
                            <x-input id="name1" class="flex mt-1" type="text" name="name1" :value="old('name1')" required />
                        </div>

                        <!-- Lisättävän rivin nimike 2 -->
                        <div>
                            <x-label for="name2" :value="__('Nimike 2')" />
                            <x-input id="name2" class="flex mt-1" type="text" name="name2" :value="old('name2')" />
                        </div>

                        <!-- Lisättävä määrä -->
                        <div>
                            <x-label for="qty" :value="__('Määrä')" />
                            <x-input id="qty" class="flex mt-1" type="number" step="0.01" name="qty" :value="old('qty')" required />
                        </div>

                        <!-- Yksikkö -->
                        <div>
                            <x-label for="unit" :value="__('Yksikkö')" />
                            <x-input id="unit" class="flex mt-1" type="text" name="unit" :value="old('unit')" required />
                        </div>

                        <!-- Ostohinta alv0%. Hinta / yksikkö -->
                        <div>
                            <x-label for="purchase_price" :value="__('Ostohinta € / yksikkö')" />
                            <x-input id="purchase_price" class="flex mt-1" type="number" step="0.01" name="purchase_price" :value="old('purchase_price')" required />
                        </div>

                        <!-- Tarjottava hinta / yksikkö -->
                        <div>
                            <x-label for="quote_price" :value="__('Tarjous € / yksikkö')" />
                            <x-input id="quote_price" class="flex mt-1" type="number" step="0.01" name="quote_price" :value="old('quote_price')" required />
                        </div>

                        <!-- Vero -->
                        <div>
                            <x-label for="vat" :value="__('Vero %')" />
                            <x-input id="vat" class="flex mt-1" type="text" name="vat" :value="old('vat')" required />
                        </div>

                        <!-- Tavarantoimittaja -->
                        <div>
                            <x-label for="supplier" :value="__('Tavarantoimittaja')" />
                            <x-input id="supplier" class="flex mt-1" type="text" name="supplier" :value="old('supplier')" />
                        </div>
                        
                        <!-- Riville tulostuva viite/huomautus -->
                        <div>
                            <x-label for="note" :value="__('Vapaa tekstikenttä')" />
                            <x-input id="note" class="flex mt-1" type="text" name="note" :value="old('note')" />
                        </div>

                        <!-- Luo tuote- painike -->
                        <x-quotia.add-item></x-quotia.add-item>

                    </form>

                    
                            
                </div>
                    </div>

                </div>        
                </div>
            
            </div>
            

</x-app-layout>

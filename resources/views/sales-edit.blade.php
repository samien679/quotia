<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tarjousrivit & hinnoittelu') }}
        </h2>
    </x-slot>

<x-slot name="info">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Yhteensä: ') }}{{ $sumOfQuote }}{{ __('€ alv0%') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between">
                <div class="p-6 bg-white border-b border-gray-200">
                    Lisää seuraavaksi tarjoukselle tulostuvat rivit ja määrittele niille haluamasi hinnoittelu.



                    <!-- Taulukko jossa kulurivit -->
                    <div class="pt-8">
                        <table class="w-full text-right bg-blue-200 border-collapse border-blue-600 table-auto shadow-md">
                           <thead>
                             <tr class="font-bold text-gray-800">  
                                <th class="w-1/6 py-1 pr-2 bg-blue-400 border border-blue-600 text-center">Kulurivit</th>      
                                <th class="py-1 pr-2 bg-blue-500 border border-blue-600 text-right">Tuotekoodi</th>
                                <th class="py-1 pr-2 bg-blue-500 border border-blue-600 text-right">Nimike 1</th>
                                <th class="py-1 pr-2 bg-blue-500 border border-blue-600 text-right">Nimike 2</th>
                                <th class="py-1 pr-2 bg-blue-500 border border-blue-600 text-right">Määrä</th>
                                <th class="py-1 pr-2 bg-blue-500 border border-blue-600 text-right">á</th>
                                <th class="py-1 pr-2 bg-blue-500 border border-blue-600 text-right">Rivi</th>
                                <th class="py-1 pr-2 bg-blue-500 border border-blue-600 text-right">Tukkuri</th>
                                <th class="py-1 pr-2 bg-blue-500 border border-blue-600 text-center">Muokkaa</th>
   
                             </tr>
                           </thead>
                           <tbody>
                               
                           @foreach ($purchaseItems as $purchaseItem)
                               
                             <tr>
                                 <td class="py-1 pr-2  border-blue-600"></td>
                               <td class="py-1 pr-2 border border-blue-600">{{ $purchaseItem->product_number }}</td>
                               <td class="py-1 pr-2 border border-blue-600">{{ $purchaseItem->name1 }}</td>
                               <td class="py-1 pr-2 border border-blue-600">{{ $purchaseItem->name2 }}</td>
                               <td class="py-1 pr-2 border border-blue-600">{{ $purchaseItem->qty }} {{ $purchaseItem->unit }}</td>
                               <td class="py-1 pr-2 border border-blue-600">{{ $purchaseItem->purchase_price }}€</td>
                               <td class="py-1 pr-2 border border-blue-600">{{ $purchaseItem->purchase_price * $purchaseItem->qty }}€</td>
                               <td class="py-1 pr-2 border border-blue-600">{{ $purchaseItem->supplier }}</td>
                               <td class="text-center py-1 pr-2  border border-green-600">
   
                                   <!-- Lomake rivin poistamiseksi -->
                                   <form method="POST" action="{{ route('purchase_items.destroy', $purchaseItem->id) }}">
                                   @csrf
                                   <input type="hidden" name="_method" value="DELETE">
                                   <button type="submit" class="text-red-500 fa fa-trash"></button>
                                   </form>
   
                               </td>
                             </tr>
                             
                           @endforeach
   
                           </tbody>
                         </table>
                    <div class="pt-8">
                <!-- Lomake uuden tarjousrivin lisäämiseksi tietokantaan -->
                    <form method="POST" action="{{ route('quote_items.store') }}">
                        @csrf
                        <div class="flex flex-wrap justify-start border rounded-lg shadow-sm p-3">

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
                            <x-input id="qty" class="flex mt-1" type="number" step="0.01" name="qty" :value="old('qty')" />
                        </div>

                        <!-- Yksikkö -->
                        <div>
                            <x-label for="unit" :value="__('Yksikkö')" />
                            <x-input id="unit" class="flex mt-1" type="text" name="unit" :value="old('unit')" required />
                        </div>

                        <!-- Tarjottava hinta / yksikkö -->
                        <div>
                            <x-label for="quote_price" :value="__('Tarjous € / yksikkö')" />
                            <x-input id="quote_price" class="flex mt-1" type="number" step="0.01" name="quote_price" :value="old('quote_price')" />
                        </div>

                        <!-- Vero -->
                        <div>
                            <x-label for="vat" :value="__('Vero %')" />
                            <x-input id="vat" class="flex mt-1" type="text" name="vat" :value="old('vat')" />
                        </div>

                        <!-- Riville tulostuva viite/huomautus -->
                        <div>
                            <x-label for="note" :value="__('Vapaa tekstikenttä')" />
                            <x-input id="note" class="flex mt-1" type="text" name="note" :value="old('note')" />
                        </div>

                        <!-- Luo tuote- painike -->
                        <x-quotia.add-item></x-quotia.add-item>

                    </div>
                    </form>

                    <!-- Taulukko jossa veloitusrivit -->
                    <div class="pt-10">
                        <table class="w-full text-right bg-green-200 border-collapse border-green-600 table-auto shadow-md">
                           <thead>
                             <tr class="font-bold text-gray-800">        
                            <th class="w-1/6  py-1 pr-2 bg-green-400 border border-green-600 text-center">Tarjousrivit</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Tuotekoodi</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Nimike 1</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Nimike 2</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Määrä</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">á</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Riviarvo</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-right">Verokanta</th>
                            <th class="py-1 pr-2 bg-green-500 border border-green-600 text-center">Muokkaa</th>

   
                             </tr>
                           </thead>
                           <tbody>
                               
                           @foreach ($quoteItems as $quoteItem)
                               
                             <tr class="pt-3">
                                 <td class="py-1 pr-2 border border-green-600"></td>
                               <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->product_number }}</td>
                               <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->name1 }}</td>
                               <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->name2 }}</td>
                               <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->qty }} {{ $quoteItem->unit }}</td>
                               <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->quote_price }}{{ __(' €') }}</td>
                               <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->item_value }}{{ __(' €') }}</td>
                               <td class="py-1 pr-2 border border-green-600">{{ $quoteItem->vat }}{{ __(' %') }}</td>
                               <td class="text-center py-1 pr-2  border border-green-600">
                                <div class="flex flex-row justify-around">

                                   <!-- Avaa ponnahdusikkuna hinnoitteluun -->
                                   
                                   <div x-data="{ open: false }">
                                    <div class="text-red-500 fa fa-euro-sign"
                                        @click="open = true"></div>
                                    <div class="fixed z-1 w-full h-full top-0 left-0 flex items-center justify-center" x-cloak x-show="open">
                                        <div class="fixed w-full h-full bg-gray-500 opacity-50"></div>
                                        <div class="relative z-2 w-3/12 bg-white p-8 mx-auto rounded-xl flex flex-col items-center" @click.away="open = false">
                                        <p class="text-xl font-serif pb-4">Hello world, I am a free modal :)</p>
                                        <button class="px-4 py-2 bg-red-400 hover:bg-red-700 text-white text-xl font-serif rounded-full border-none focus:outline-none"
                                            @click="open = false">Close Modal</button>
                                        </div>
                                    </div>
                                    </div>

                                   <!-- Näytä / muokkaa rivin viiteteksti -->

                                   <form method="GET" action="{{ route('quote_items.destroy', $quoteItem->id) }}">
                                   @csrf
                                   <input type="hidden" name="_method" value="DELETE">
                                   <button type="submit" class="text-red-500 fa fa-info"></button>
                                   </form>

                                   <!-- Lomake rivin poistamiseksi -->
                                   <form method="POST" action="{{ route('quote_items.destroy', $quoteItem->id) }}">
                                   @csrf
                                   <input type="hidden" name="_method" value="DELETE">
                                   <button type="submit" class="text-blue-500 fa fa-trash"></button>
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
            </div>
        </div>

</x-app-layout>

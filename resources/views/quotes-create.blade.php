<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quotia  |  Hankintakulut') }}
        </h2>
    </x-slot>

<x-slot name="info">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('178,80€ alv0%') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-lg">
                    Lisää ensin tarjottavan työn toteutuessa maksettavat henkilöstö -ja materiaalikustannukset. Erittele ainakin työtunnit ja materiaalit omille riveilleen. 
                </div>

                <div class="p-6 bg-white border-b border-gray-200 mt-6 ">
                    
                    <!-- Tallenna syötetyt tiedot tietokantaan -->
                    <form method="POST" action="{{ route('quotes.store') }}">
                        @csrf
                        <div class="flex flex-wrap justify-start ">

                        <!-- Lisättävän kulun tuotekoodi -->
                        <div>
                            <x-label for="Tuotekoodi" :value="__('Tuotekoodi')" />
            
                            <x-input id="tuotekoodi" class="flex mt-1" type="text" name="tuotekoodi" :value="old('tuotekoodi')" required autofocus />
                        </div>
                        
                        <!-- Lisättävän kulun nimike 1 -->
                        <div>
                            <x-label for="Nimike1" :value="__('Nimike 1')" />
            
                            <x-input id="nimike1" class="flex mt-1" type="text" name="nimike1" :value="old('nimike1')" required autofocus />
                        </div>

                        <!-- Lisättävän kulun nimike 2 -->
                        <div>
                            <x-label for="Nimike2" :value="__('Nimike 2')" />
            
                            <x-input id="nimike2" class="flex mt-1" type="text" name="nimike2" :value="old('nimike2')" required autofocus />
                        </div>

                        <!-- Lisättävä määrä -->
                        <div>
                            <x-label for="Maara" :value="__('Määrä')" />
            
                            <x-input id="maara" class="flex mt-1" type="number" name="maara" :value="old('maara')" required autofocus />
                        </div>

                        <!-- Yksikkö -->
                        <div>
                            <x-label for="Yksikko" :value="__('Yksikkö')" />
            
                            <x-input id="yksikko" class="flex mt-1" type="text" name="yksikko" :value="old('yksikko')" required autofocus />
                        </div>

                        <!-- Hinta / yksikkö -->
                        <div>
                            <x-label for="Hinta" :value="__('€ / á')" />
            
                            <x-input id="hinta" class="flex mt-1" type="text" name="hinta" :value="old('hinta')" required autofocus />
                        </div>

                        <i class="fa fa-plus pt-7 pl-1 flex text-3xl text-gray-600 "></i>

                    </div>
                </div>
                <div class="p-6 bg-white border-b border-blue-200 mt-6 text-l flex w-full">
                    <table class="table-auto bg-green-200 border-collapse border-green-600 w-full text-right">
                        <thead>
                          <tr class="text-gray-800">
                            <th class="font-medium border border-green-600 bg-green-600">Tuotekoodi</th>
                            <th class="font-medium border border-green-600 bg-green-600 ">Nimike 1</th>
                            <th class="font-medium border border-green-600 bg-green-600 ">Nimike 2</th>
                            <th class="font-medium border border-green-600 bg-green-600 ">Määrä</th>
                            <th class="font-medium border border-green-600 bg-green-600 ">Yksikkö</th>
                            <th class="font-medium border border-green-600 bg-green-600 ">€ / á</th>
                            <th class="font-medium border border-green-600 bg-green-600 "></th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border border-green-600">1002035GH</td>
                            <td class="border border-green-600">Työtunti</td>
                            <td class="border border-green-600">Työtunti</td>
                            <td class="border border-green-600">4</td>
                            <td class="border border-green-600">h</td>
                            <td class="border border-green-600">72</td>
                            <td class="border border-green-600 text-center">

                                <i class="fa fa-trash text-red-500"></i>
                            </td>

                          </tr>
                          <tr>
                            <td class="border border-green-600">102588890</td>
                            <td class="border border-green-600">Muhviputki HT</td>
                            <td class="border border-green-600">110x6000</td>
                            <td class="border border-green-600">10</td>
                            <td class="border border-green-600">m</td>
                            <td class="border border-green-600">3</td>
                            <td class="border border-green-600 text-center">
                                
                                <i class="fa fa-trash text-red-500"></i>
                            </td>
                          </tr>
                          <tr>
                            <td class="border border-green-600">68880496</td>
                            <td class="border border-green-600">Muhvikulma HT</td>
                            <td class="border border-green-600">110x88,5</td>
                            <td class="border border-green-600">4</td>
                            <td class="border border-green-600">kpl</td>
                            <td class="border border-green-600">12,50</td>
                            <td class="border border-green-600 text-center">
                                
                                <i class="fa fa-trash text-red-500"></i>
                            </td>

                        </tr>
                        </tbody>
                      </table>
                      
                    </div>            
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hankintakulut') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-lg">
                    Lisää omalle yrityksellesi tarjottavasta työstä aiheutuvat kulut. Näiden perusteella lasketaan loppuasiakkaalle tarjottava hinta.
                </div>

                <div class="p-6 bg-white border-b border-gray-200 mt-6 ">
                    
                    <!-- Tallenna syötetyt tiedot tietokantaan -->
                    <form method="POST" action="{{ route('quotes.store') }}">
                        @csrf
                        <div class="flex flex-wrap justify-center">

                        <!-- Lisättävän kulun tuotekoodi -->
                        <div>
                            <x-label for="Tuotekoodi" :value="__('Tuotekoodi')" />
            
                            <x-input id="tuotekoodi" class="flex mt-1" type="text" name="tuotekoodi" :value="old('tuotekoodi')" required autofocus />
                        </div>
                        
                        <!-- Lisättävän kulun nimike -->
                        <div>
                            <x-label for="Nimike" :value="__('Nimike')" />
            
                            <x-input id="email" class="flex mt-1" type="text" name="nimike" :value="old('nimike')" required autofocus />
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

                        <i class="fa fa-plus-circle flex mt-7 text-xl "></i>

                    </div>
                </div>
                <div class="p-6 bg-white border-b border-blue-200 mt-6 text-l flex justify-evenly">
                    <table class="table-auto bg-green-200 border-collapse border-green-600 w-full text-right max-w-5xl">
                        <thead>
                          <tr>
                            <th class="border border-green-600">Tuotekoodi</th>
                            <th class="border border-green-600">Nimike</th>
                            <th class="border border-green-600">Määrä</th>
                            <th class="border border-green-600">Yksikkö</th>
                            <th class="border border-green-600">€ / á</th>
                            <th class="border border-green-600"></th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border border-green-600">1002035</td>
                            <td class="border border-green-600">Työtunti</td>
                            <td class="border border-green-600">4</td>
                            <td class="border border-green-600">h</td>
                            <td class="border border-green-600">72</td>
                            <td class="border border-green-600 text-center">

                                <i class="fa fa-trash text-red-500 text-xl"></i>
                            </td>

                          </tr>
                          <tr>
                            <td class="border border-green-600">102588890</td>
                            <td class="border border-green-600">HT-Putki</td>
                            <td class="border border-green-600">10</td>
                            <td class="border border-green-600">m</td>
                            <td class="border border-green-600">3</td>
                            <td class="border border-green-600 text-center">
                                
                                <i class="fa fa-trash text-red-500 text-xl"></i>
                            </td>
                          </tr>
                          <tr>
                            <td class="border border-green-600">68880496</td>
                            <td class="border border-green-600">Muhvikulma</td>
                            <td class="border border-green-600">4</td>
                            <td class="border border-green-600">kpl</td>
                            <td class="border border-green-600">12,50</td>
                            <td class="border border-green-600 text-center">
                                
                                <i class="fa fa-trash text-red-500 text-xl"></i>
                            </td>

                        </tr>
                        </tbody>
                      </table>
                      
                    </div>            
            </div>
        </div>
    </div>
</x-app-layout>

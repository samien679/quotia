<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aloitus') }}
        </h2>
    </x-slot>

    <x-slot name="info">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tarjouslaskenta LVI -ja Sähköurakoitsijoille') }}
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-gray-200">
                Tervetuloa! Luo uusi tarjous tai valitse listalta aiemmin luotu.
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">

                <!-- Lomake uuden asiakkaan tietojen syöttämiseksi -->
                <form method="POST" id="newQuote" action="{{ route('clients.store') }}">
                    @csrf
                    <div class="flex flex-wrap border rounded-lg shadow-md p-4 m-4 mr-auto">


                        <!-- Asiakasyrityksen nimi -->
                        <div>
                            <x-label for="client_name" :value="__('Yrityksen nimi')" />
                            <x-input id="client_name" class="flex mt-1" type="text" name="client_name"
                                :value="old('client_name')" autofocus required />
                        </div>

                        <!-- Yhteyshenkilö -->
                        <div>
                            <x-label for="client_contact_person" :value="__('Yhteyshenkilö')" />
                            <x-input id="client_contact_person" class="flex mt-1" type="text"
                                name="client_contact_person" :value="old('client_contact_person')" />
                        </div>

                        <!-- Puhelinnumero -->
                        <div>
                            <x-label for="client_telephone" :value="__('Puhelinnumero')" />
                            <x-input id="client_telephone" class="flex mt-1" type="text" name="client_telephone"
                                :value="old('client_telephone')" />
                        </div>

                        <!-- Sähköposti -->
                        <div>
                            <x-label for="client_email" :value="__('Sähköposti')" />
                            <x-input id="client_email" class="flex mt-1" type="text" name="client_email"
                                :value="old('client_email')" required />
                        </div>

                        <!-- Lähiosoite -->
                        <div>
                            <x-label for="client_address" :value="__('Katuosoite')" />
                            <x-input id="client_address" class="flex mt-1" type="text" name="client_address"
                                :value="old('client_address')" required />
                        </div>

                        <!-- Postinumero -->
                        <div>
                            <x-label for="client_postal_code" :value="__('Postinumero')" />
                            <x-input id="client_postal_code" class="flex mt-1" type="text" name="client_postal_code"
                                :value="old('client_postal_code')" required />
                        </div>

                        <!-- Postitoimipaikka -->
                        <div>
                            <x-label for="client_city" :value="__('Postitoimipaikka')" />
                            <x-input id="client_city" class="flex mt-1" type="text" name="client_city"
                                :value="old('client_city')" required />
                        </div>

                </form>
            </div>


            <!-- Luo uusi tarjous tietokantaan -->
            <button class="bg-green-400 p-8 font-bold text-center m-4 rounded-xl px-auto shadow-md hover:bg-green-500"
                form="newQuote" type="submit">Aloita</button>


        </div>
    </div>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl mb-4 p-4">
                        Historia
                    </h2>

                    <ul class="pl-16 pt-4">

                        <!-- Show history of users saved quotes -->
                        @foreach ($quotes as $quote)
                            <li class="pb-1">
                                <a class="block hover:text-green-600"
                                    href="{{ route('quotes.edit', $quote->id) }}">Tarjous no.
                                    {{ $quote->id }}, luotu {{ $quote->created }}</a>
                            </li>
                        @endforeach

                    </ul>


                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>

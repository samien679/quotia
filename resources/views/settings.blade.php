<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asetukset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Lomake käyttäjätietojen muokkaukseen -->
                    <form method="POST" action="{{ route('settings.store') }}">
                        @csrf
                        <div class="flex flex-wrap justify-start border rounded-lg shadow-sm p-3">

                            <!-- Yrityksen nimi -->
                            <div>
                                <x-label for="company_name" :value="__('Yrityksen nimi')" />
                                <x-input id="company_name" class="flex mt-1" type="text" name="company_name"
                                    :value="$user->company_name" autofocus />
                            </div>

                            <!-- Puhelinnumero -->
                            <div>
                                <x-label for="phone_numbero" :value="__('Puhelinnumero')" />
                                <x-input id="phone_number" class="flex mt-1" type="text" name="phone_number"
                                    :value="$user->phone_number" />
                            </div>

                            <!-- Katuosoite -->
                            <div>
                                <x-label for="street_address" :value="__('Katuosoite')" />
                                <x-input id="street_address" class="flex mt-1" type="text" name="street_address"
                                    :value="$user->street_address" />
                            </div>

                            <!-- Postinumero -->
                            <div>
                                <x-label for="postal_code" :value="__('Postinumero')" />
                                <x-input id="postal_code" class="flex mt-1" type="text" name="postal_code"
                                    :value="$user->postal_code" />
                            </div>

                            <!-- Postitoimipaikka -->
                            <div>
                                <x-label for="city" :value="__('Postitoimipaikka')" />
                                <x-input id="city" class="flex mt-1" type="text" name="city" :value="$user->city" />
                            </div>

                            <!-- Toimitusehdot -->
                            <div>
                                <x-label for="terms_of_delivery" :value="__('Toimitusehdot')" />
                                <x-input id="terms_of_delivery" class="flex mt-1" type="text" name="terms_of_delivery"
                                    :value="$user->terms_of_delivery" />
                            </div>

                            <!-- Tarjouksen voimassaoloaika -->
                            <div>
                                <x-label for="valid_days" :value="__('Tarjouksen voimassaoloaika (vrk)')" />
                                <x-input id="valid_days" class="flex mt-1" type="number" name="valid_days"
                                    :value="$user->valid_days" />
                            </div>

                            <!-- Tallenna asetukset -->
                            <div class="flex items-center">
                                <x-button class="">
                                    {{ __('Tallenna muutokset') }}
                                </x-button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

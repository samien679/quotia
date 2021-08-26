<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asetukset') }}
        </h2>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Lomake käyttäjätietojen muokkaukseen -->
                    <form method="POST" action="{{ route('settings.store') }}">
                        @csrf
                        <div class="flex flex-wrap justify-start border rounded-lg shadow-sm p-3 mt-4">

                            <!-- Puhelinnumero -->
                            <div>
                                <x-label for="phone_numbero" :value="__('Puhelinnumero')" />
                                <x-input id="phone_number" class="flex mt-1" type="text" name="phone_number"
                                    :value="old('phone_number'), $user->phone_number" autofocus />
                            </div>



                            <!-- Luo tuote- painike -->
                            <x-quotia.add-item></x-quotia.add-item>

                    </form>


                    {{-- name'); --}}
                    {{-- email')->unique() --}}
                    {{-- p('email_verified --}}
                    {{-- password'); --}}
                    {{-- Token(); --}}
                    {{-- phone_number')->n --}}
                    {{-- company_name')->n --}}
                    {{-- street_address')- --}}
                    {{-- postal_code')->nu --}}
                    {{-- city')->nullable( --}}
                    {{-- terms_of_delivery --}}
                    {{-- 'valid_days')->nu --}}
                </div>
            </div>

        </div>
    </div>




</x-app-layout>

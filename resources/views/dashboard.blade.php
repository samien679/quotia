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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between ">
                <div class="p-6 bg-white border-b border-gray-200 w-2/3 ">
                    Tervetuloa! Aloita uusi tarjous vihreästä painikkeesta tai valitse listalta muokattavaksi.
                </div>

                <x-quotia.create-quote-button>
                    {{ __('Uusi tarjous') }}
                </x-quotia.create-quote-button>

            </div>

            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h2 class="text-2xl mb-4 p-4 border-b">
                                Historia
                            </h2>

                            <ul class="pl-16 pt-1 divide-y divide-gray-100">

                                <!-- Show history of users saved quotes -->
                                @foreach ($quotes as $quote)
                                    <a class="block" href="{{ route('quotes.edit', $quote->id) }}">Tarjous no.
                                        {{ $quote->id }}, luotu {{ $quote->created }}</a>
                                    </li>
                                @endforeach

                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

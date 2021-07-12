<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quotia  |  Koti') }}
        </h2>
    </x-slot>

<x-slot name="info">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Tarjouslaskentaa LVI -ja Sähköurakoitsijoille.') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between">
                <div class="p-6 bg-white border-b border-gray-200 w-2/3">
                    Hei {{ Auth::user()->name }}! Aloita uusi tarjous vihreästä painikkeesta.
                </div>
            
                <x-create-quote-button>
                    {{ __('Uusi tarjous') }}
                </x-create-quote-button>
            
            </div>
            </div>
        </div>
    
</x-app-layout>

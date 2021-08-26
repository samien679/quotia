<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asetukset') }}
        </h2>
    </x-slot>

    <x-slot name="info">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yhteensä: ') }}<strong>{{ $quote->sum_zero_vat }}</strong>{{ __('€') }}
    </x-slot>

    <x-slot name="info2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

    </x-slot>

    //

</x-app-layout>

<!-- Luo uusi tarjous tietokantaan -->
<form method="POST" action="{{ route('quotes.store') }}">
@csrf

<button {{ $attributes->merge([
  'type' => 'submit', 
  'class' => 'flex px-6 bg-green-400 p-8 font-bold text-center'

  ]) }}>

  {{ $slot }}

</button>

</form>
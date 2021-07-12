<a {{ $attributes->merge([
  'href' => '/quotes/create',
  'type' => 'submit', 
  'class' => 'w-1/3 px-6 bg-green-400 p-8 font-bold text-center'

  ]) }}>

  {{ $slot }}

</a>
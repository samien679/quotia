<a {{ $attributes->merge([
  'href' => '/quotes/create',
  'type' => 'submit', 
  'class' => 'w-1/2 px-6 bg-green-500 p-8 text-center'

  ]) }}>

  {{ $slot }}

</a>
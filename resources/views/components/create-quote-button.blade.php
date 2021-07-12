<a {{ $attributes->merge([
  'href' => '/quotes/create',
  'type' => 'submit', 
  'class' => 'max-w-3xl px-6 bg-green-500'

  ]) }}>

  {{ $slot }}

</a>
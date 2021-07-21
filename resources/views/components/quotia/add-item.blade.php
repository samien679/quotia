<button {{ $attributes->merge(['type' => 'submit', 'class' => 'fill-current inline-flex pl-1 text-2xl fa fa-plus pt-7 hover:text-green-500 ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
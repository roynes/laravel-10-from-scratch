<button {{ $attributes([
    'type' => 'button',
    'class' => 'px-6 py-2 rounded-xl text-white uppercase font-semibold'
])}}>
    {{ $slot }}
</button>
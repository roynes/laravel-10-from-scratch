<x-button type="submit"
    {{ $attributes->merge(['class' => 'bg-blue-500 hover:bg-blue-0'])}}>
    {{ $slot }}
</x-button>
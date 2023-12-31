@props([
    'name',
    'label' => null,
    'placeholder' => ''
])

<x-form.field>
    @if ($label)
        <x-form.label for="{{ $name }}" label="{{ $label }}"/>        
    @endif
    <div class="mt-2">
        <textarea id="{{ $name }}" name="{{ $name }}" rows="3"
            class="block w-full rounded-md border-0 px-3 
                   py-1.5 text-gray-900 shadow-sm ring-1 
                   ring-inset ring-gray-300 placeholder:text-gray-400 
                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                   sm:text-sm sm:leading-6"
            placeholder="{{ $placeholder }}">{{ old($name) }}</textarea>
    </div>
    <x-form.error for="{{ $name }}"/>
</x-form.field>
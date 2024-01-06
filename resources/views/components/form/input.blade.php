@props([
    'name',
    'label' => '',
    'placeholder' => '',
    'type' => 'text',
    'autocomplete' => '',
    'value' => old($name)
])

<div class="col-span-full">
    <x-form.label for="{{ $name }}" label="{{ $label }}"/>
    <div class="mt-2">
        <div class="flex w-full rounded-md shadow-sm
                    ring-1 ring-inset ring-gray-300 
                    focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
                   class="block w-full border-0 bg-transparent 
                          px-3 py-3 text-gray-900 
                          placeholder:text-gray-400 focus:ring-0 
                          sm:text-sm sm:leading-6"
                   placeholder="{{ $placeholder }}"
                   autocomplete="{{ $autocomplete }}"
                   value="{{ $value }}">
        </div>
    </div>
    <x-form.error for="{{ $name }}"/>
</div>
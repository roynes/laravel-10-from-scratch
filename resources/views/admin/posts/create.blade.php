<x-layout>
    <x-settings>
        <x-slot name="header">
            <div class="mx-auto max-w-screen-lg py-8 border-b mb-8">
                <h1 class="text-3xl font-semibold leading-7 text-gray-900">Have an idea?</h2>
                <p class="mt-3 text-md leading-6 text-gray-600">Write a new post below!</p>
            </div>
        </x-slot>

        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12">
                <div class="border-gray-900/10 pb-12">
                    <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        {{-- Title --}}
                        <x-form.input name="title" 
                                    placeholder="Write your awesome title" 
                                    label="Title"/>

                        {{-- Excerpt --}}
                        <x-form.text-area name="excerpt"
                                        label="Excerpt"
                                        placeholder="Introduce your thoughts"/>

                        {{-- Body --}}
                        <x-form.text-area name="body"
                                        label="Main content"
                                        placeholder="Finally, write everything down here"/>

                        {{-- Thumbnail --}}
                        <x-form.input name="thumbnail" 
                                    label="Thumbnail"
                                    type="file"/>

                        {{-- Category --}}
                        <div class="col-span-1 mt-3">
                            <x-form.label for="category_id" label="Category"/>
                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ ucwords($category->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <x-form.error for="category"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-x-6">
                <a href="/">
                    <x-button class="px-4 font-semibold text-black">
                        Cancel
                    </x-button>
                </a>
                <x-form.button class="text-sm font-semibold">Publish</x-form.button>
            </div>
        </form>
    </x-settings>
</x-layout>

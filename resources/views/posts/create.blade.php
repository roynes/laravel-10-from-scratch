<x-layout>
    <div class="mx-auto max-w-screen-lg py-8 mt-20">
        <h1 class="text-3xl font-semibold leading-7 text-gray-900">Have an idea?</h2>
        <p class="mt-3 text-md leading-6 text-gray-600">Write a new post below!</p>
    </div>

    <x-panel class="mx-auto max-w-screen-lg p-8 mt-4">
        <form action="/admin/posts" method="POST">
            @csrf
            <div class="space-y-12">
                <div class="border-gray-900/10 pb-12">
                    <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        {{-- Title --}}
                        <div class="col-span-full">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <div
                                    class="flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                    <input type="text" name="title" id="title" autocomplete="title"
                                        class="block flex-1 border-0 bg-transparent 
                                               px-3 py-1.5 text-gray-900 
                                               placeholder:text-gray-400 focus:ring-0 
                                               sm:text-sm sm:leading-6"
                                        placeholder="Write your awesome title"
                                        value="{{ old('title') }}">
                                </div>
                            </div>
                            @error('title')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Excerpt --}}
                        <div class="col-span-full">
                            <label for="excerpt"
                                class="block text-sm font-medium leading-6 text-gray-900">Excerpt</label>
                            <div class="mt-2">
                                <textarea id="excerpt" name="excerpt" rows="3"
                                    class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Introduce your thoughts">{{ old('excerpt') }}</textarea>
                            </div>
                            @error('excerpt')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Body --}}
                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Main
                                content</label>
                            <div class="mt-2">
                                <textarea id="body" name="body" rows="3"
                                    class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Write everything here">{{ old('body') }}</textarea>
                            </div>
                            @error('body')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-1 mt-3">
                            <label for="category_id"
                                class="block text-sm font-medium leading-6 text-gray-900">
                                Category
                            </label>

                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ ucwords($category->name) }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
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
                <x-submit-button class="text-sm font-semibold">Publish</x-submit-button>
            </div>
        </form>
    </x-panel>
</x-layout>

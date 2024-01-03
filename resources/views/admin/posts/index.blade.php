<x-layout>
    {{-- <x-settings>
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
                        <x-form.input name="title" 
                                    placeholder="Write your awesome title" 
                                    label="Title"/>

                        <x-form.text-area name="excerpt"
                                        label="Excerpt"
                                        placeholder="Introduce your thoughts"/>

                        <x-form.text-area name="body"
                                        label="Main content"
                                        placeholder="Finally, write everything down here"/>

                        <x-form.input name="thumbnail" 
                                    label="Thumbnail"
                                    type="file"/>

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
    </x-settings> --}}

    <x-settings>
        <x-slot name="header">
            <div class="mx-auto max-w-screen-lg py-8 border-b mb-8">
                <h1 class="text-3xl font-semibold leading-7 text-gray-900">Manage Posts</h2>
            </div>
        </x-slot>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900 hover:underline">
                                                    <a href="/posts/{{ $post->slug }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-settings>
</x-layout>

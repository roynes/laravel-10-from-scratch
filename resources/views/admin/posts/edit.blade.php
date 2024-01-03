<x-layout>
    <x-settings>
        <x-slot name="header">
            <div class="mx-auto max-w-screen-lg py-8 border-b mb-8">
                <h1 class="text-3xl font-semibold leading-7 text-gray-900">
                    Edit Post: {{ $post->title }}
                </h1>
            </div>
        </x-slot>

        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="border-gray-900/10 pb-12">
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form.input name="title" label="Title" :value="old('title', $post->title)" required />
                    <x-form.input name="slug" label="Slug" :value="old('slug', $post->slug)" required />
        
                    <div class="col-span-full">
                        <div class="flex mt-6">
                            <div class="flex-1">
                                <x-form.input label="Thumbnail" name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                            </div>
            
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
                        </div>
                    </div>
        
                    <x-form.text-area name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-form.text-area>
                    <x-form.text-area name="body" required>{{ old('body', $post->body) }}</x-form.text-area>
        
                    <x-form.field>
                        <x-form.label for="category" label="Category"/>
        
                        <select name="category_id" id="category_id" required>
                            @foreach (\App\Models\Category::all() as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
        
                        <x-form.error for="category"/>
                    </x-form.field>
                </div>
            </div>

            <div class="flex items-center justify-end gap-x-6">
                <x-form.button>Update</x-form.button>
            </div>
        </form>
    </x-settings>
</x-layout>
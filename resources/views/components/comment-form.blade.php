@props(['link'])

<x-panel>
  <form action="{{ $link }}" method="POST" class="space-y-6">
    <header class="flex items-center space-x-4">
        <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id ?? 1 }}" 
             alt="avatar" width="60" class="rounded-lg">
        
        <h2>Want to participate?</h2>
    </header>

    @csrf

    <main>
      <textarea name="body" id="body" cols="30" rows="3" 
                placeholder="Quick, think of something to say"
                class="w-full border rounded-xl focus:outline-none p-4 focus:ring-4"
      >{!! old('body') !!}</textarea>

      @error('body')
          <span class="text-sm text-red-500">{{ $message }}</span>
      @enderror
    </main>

    <div class="flex justify-end">
      <x-submit-button class=" text-sm">
        Post
      </x-submit-button>
    </div>
  </form>
</x-panel>
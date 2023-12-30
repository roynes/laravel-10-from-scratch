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
      <x-form.text-area name="body" placeholder="Quick, think of something to say"/>      
    </main>

    <div class="flex justify-end">
      <x-form.button class=" text-sm">
        Post
      </x-form.button>
    </div>
  </form>
</x-panel>
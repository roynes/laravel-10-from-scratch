<x-panel>
  <form action="/comment" method="post" class="space-y-6">
    <header class="flex items-center space-x-4">
        <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id ?? 1 }}" 
             alt="avatar" width="60" class="rounded-lg">
        
        <h2>Want to participate?</h2>
    </header>

    @csrf

    <main>
      <textarea name="body" id="body" cols="30" rows="3" 
                placeholder="Quick, think of something to say"
                class="w-full border rounded-xl focus:outline-none p-4 focus:ring-4"></textarea>
    </main>

    <div class="flex justify-end">
      <x-button type="submit" 
                class="bg-blue-500 hover:bg-blue-600 text-sm">
        Post
      </x-button>
    </div>
  </form>
</x-panel>
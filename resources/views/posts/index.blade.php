{{-- @extends('partials.base')

@section('contents')
    @foreach ($posts as $post)
        <div class="my-3 rounded-sm bg-blue-200 px-3 py-3">
            <div class="my-3 flex w-full flex-col">
                <a href="/posts/{{ $post->id }}" class="text-2xl">
                    <button>{{ $post->title }}</button>
                </a>
                <div class="flex flex-row text-sm">
                    <p> 
                        By 
                        <a href="/authors/{{ $post->author->username }}">
                            <button>{{ $post->author->name }}</button>
                        </a>  
                        in 
                        <a href="/categories/{{ $post->category->slug }}">
                            <button>{{ $post->category->name }}</button>
                        </a>
                    </p>
                </div>

            </div>
            <div>
                <p>{{ $post->excerpt }}</p>
            </div>
        </div>
    @endforeach
@endsection --}}


<x-layout>
    @include('posts.header')

    <main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
        @if ($posts->count() > 0)
            <x-posts-grid :posts="$posts"/>
        @else
            <div class="w-full text-center">
                No posts yet. Please check back later.
            </div>
        @endif
    </main>
</x-layout>

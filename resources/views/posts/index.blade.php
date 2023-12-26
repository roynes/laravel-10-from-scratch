<x-layout>
    @include('posts.header')

    <main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
        @if ($posts->count() > 0)
            <x-posts-grid :posts="$posts"/>

            <div class="w-full">
                {{ $posts->onEachSide(3)->links() }}
            </div>
        @else
            <div class="w-full text-center">
                No posts yet. Please check back later.
            </div>
        @endif
    </main>
</x-layout>

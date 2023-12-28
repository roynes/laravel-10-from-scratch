@props(['comment'])

<article class="flex bg-gray-100 border-gray-200 rounded-xl p-6 space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="avatar" width="60" class="rounded-lg">
    </div>
    <div>
        <header>
            <strong class="font-bold">{{ $comment->author->username }}</strong>
            <p class="text-xs">
                Posted {{ $comment->created_at->diffForHumans()}}
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
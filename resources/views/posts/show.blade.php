@extends('partials.base')

@section('contents')
    <div class="my-3 rounded-sm bg-blue-200 px-3 py-3">
        <div class="mb-3 mt-5 text-3xl">
            <p>{{ $post->title }}</p>
        </div>
        <div class="mb-8 mt-5 text-sm">
            <a href="/categories/{{ $post->category->slug }}">
                <p>{{ $post->category->name }}</p>
            </a>
        </div>
        <div class="mb-8 text-lg">
            <p>{{ $post->body }}</p>
        </div>
        <div class="flex">
            <a class="rounded-md bg-green-500 p-3 px-5" href="/posts">Back</a>
        </div>
    </div>
@endsection

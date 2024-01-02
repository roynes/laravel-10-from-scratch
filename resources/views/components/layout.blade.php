<!doctype html>

<title>Laravel From Scratch Blog</title>
{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@vite('resources/css/app.css')

<script src="//unpkg.com/alpinejs" defer></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif;">
    <section class="px-6 py-8">
        <nav class="md:flex md:items-center md:justify-between">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex flex-row items-center justify-center">
                @guest
                    <a href="/register" class="text-xs font-bold uppercase">
                        Register
                    </a>
                    <a href="/login" class="text-xs font-bold uppercase ml-6 mr-3">
                        Log in
                    </a>
                @endguest

                @auth
                    <div class="lg:mr-8">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <span class="text-xs font-bold uppercase">
                                    Welcome, {{ auth()->user()->name }}
                                </span>
                            </x-slot>

                            <x-dropdown-item href="/admin/dashboard"
                                            :active="request()->is('admin/dashboard')">
                                Dashboard
                            </x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create"
                                            :active="request()->is('admin/posts/create')">
                                New Post
                            </x-dropdown-item>
                            <x-dropdown-item>
                                <form action="/logout" 
                                    method="post" 
                                    class="w-full">
                                    @csrf
                                    <button type="submit" 
                                            class="">
                                        Log out
                                    </button>
                                </form>
                            </x-dropdown-item>
                        </x-dropdown>
                    </div>
                @endauth

                <a href="#newsletter"
                   class="ml-3 rounded-full 
                         bg-blue-500 px-5 py-3 
                         text-xs font-semibold 
                         uppercase text-white">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="mt-16 rounded-xl border border-black 
                       border-opacity-5 bg-gray-100 px-10 py-16 text-center">
            <img src="/images/lary-newsletter-icon.svg" 
                 alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="mt-3 text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10 flex flex-col align-middle">
                <div class="relative mx-auto inline-block rounded-full lg:bg-gray-200">
                    <form method="POST" action="/newsletter" class="text-sm lg:flex">
                        @csrf
                        <div class="flex items-center lg:px-5 lg:py-3">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" 
                                    type="text" placeholder="Your email address"
                                    class="py-2 pl-4 focus-within:outline-none lg:bg-transparent lg:py-0">
                        </div>

                        <button type="submit"
                                class="mt-4 rounded-full bg-blue-500 px-8 
                                       py-3 text-xs font-semibold uppercase 
                                       text-white transition-colors duration-300 
                                       hover:bg-blue-600 lg:ml-3 lg:mt-0">
                            Subscribe
                        </button>
                    </form>
                </div>

                @error('email')
                    <span class="text-sm text-red-500 relative mx-auto inline-block mt-3">{{ $message }}</span>
                @enderror
            </div>
        </footer>
    </section>
</body>

@if (session()->has('success'))
    <x-flash>
        <p>{{ session('success') }}</p>
    </x-flash>
@endif

</html>

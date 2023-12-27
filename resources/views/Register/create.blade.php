<x-layout>
    <section class="mx-auto flex max-w-lg justify-center px-6 py-8 align-middle">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-xl font-bold leading-9 tracking-tight text-gray-900">
                    Register !
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm lg:w-72 md:w-64">
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                            Email address
                        </label>
                        <div class="mt-2">
                            <input id="email" name="email" 
                                   type="email" autocomplete="email"
                                   value="{{ old('email')}}"
                                   class="block w-full rounded-md border-0 py-1.5 
                                          text-gray-900 shadow-sm ring-1 ring-inset 
                                          ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                                          focus:ring-inset focus:ring-indigo-600 sm:text-sm
                                          sm:leading-6 px-3">
                        </div>

                        @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                            Username
                        </label>
                        <div class="mt-2">
                            <input id="username" name="username"
                                   type="text" autocomplete="username"
                                   value="{{ old('username')}}"
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 
                                          shadow-sm ring-1 ring-inset ring-gray-300 
                                          placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                          focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3">
                        </div>

                        @error('username')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                            Name
                        </label>
                        <div class="mt-2">
                            <input id="name" name="name"
                                   type="text" autocomplete="name"
                                   value="{{ old('name')}}"
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 
                                          shadow-sm ring-1 ring-inset ring-gray-300 
                                          placeholder:text-gray-400 focus:ring-2 focus:ring-inset 
                                          focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3">
                        </div>

                        @error('name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-16">
                        <div class="flex items-center justify-between">
                            <label for="password"
                                   class="block text-sm font-medium leading-6 text-gray-900">
                                Password
                            </label>
                        </div>
                        <div class="mt-2">
                            <input id="password" 
                                   name="password" 
                                   type="password" 
                                   autocomplete="current-password"
                                   class="block w-full rounded-md border-0 py-1.5 
                                          text-gray-900 shadow-sm ring-1 ring-inset 
                                          ring-gray-300 placeholder:text-gray-400 
                                          focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                          sm:text-sm sm:leading-6 px-3">
                        </div>

                        @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button 
                            type="submit"
                            class="flex w-full justify-center rounded-md 
                                   bg-indigo-600 px-3 py-1.5 text-sm font-semibold 
                                   leading-6 text-white shadow-sm hover:bg-indigo-500 
                                   focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 
                                   focus-visible:outline-indigo-600">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>

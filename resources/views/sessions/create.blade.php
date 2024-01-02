<x-layout>
    <section class="mx-auto flex max-w-lg justify-center px-6 py-8 align-middle">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-xl font-bold leading-9 tracking-tight text-gray-900">
                    Log in
                </h2>
            </div>

            <x-panel class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm lg:w-96 md:w-64">
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-6">
                        <x-form.input name="email" 
                                      label="Email address"
                                      autocomplete="email"/>
                    </div>
                    
                    <div class="mb-16">
                        <x-form.input name="password" 
                                      label="Password"
                                      type="password"
                                      autocomplete="password"/>
                    </div>

                    <div>
                        <x-form.button class="text-sm font-semibold w-full leading-6">
                            Log in
                        </x-form.button>
                    </div>
                </form>
            </x-panel>
        </div>
    </section>
</x-layout>

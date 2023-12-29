<x-layout>
    <form class="max-w-screen-lg mx-auto">
        <div class="space-y-12">
            <div class="border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Have an idea?</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Write a new post below!</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title" autocomplete="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 px-3"
                                    placeholder="Write your awesome title">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Main content</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Put your main thoughts here.."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/">
                <x-button class="text-black font-semibold px-4">
                    Cancel
                </x-button>
            </a>
            <x-submit-button class="text-sm font-semibold">Create</x-submit-button>
        </div>
    </form>
</x-layout>

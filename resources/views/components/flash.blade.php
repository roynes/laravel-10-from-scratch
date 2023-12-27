<div x-data="{ show: true }"
     x-init="setTimeout(() => show = false, 3000)" 
     x-show="show"
     class="fixed bottom-3 right-3 rounded-xl bg-blue-500 px-4 py-2 text-sm text-white">
    {{ $slot }}
</div>

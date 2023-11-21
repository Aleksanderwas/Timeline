<div class="py-5">
    <div class=" mx-auto sm:px-6 lg:px-8">
        <a {{ $attributes->merge(['href' => $href]) }}>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ $slot }}
            </div>
        </div>
        </a>
    </div>
</div>

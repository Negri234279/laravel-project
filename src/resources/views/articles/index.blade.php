<x-layout>
    <h1 class="text-3xl text-center font-extrabold dark:text-white mb-3">Articles</h1>

    <x-articles-filters :mode="$mode" :user="$user" />

    @if ($articles->total())
        <x-articles :articles="$articles" :user="$user" />
    @else
        <p class="text-center">No articles</p>
    @endif

    {{ $articles->appends(['mode' => $mode])->links('pagination::tailwind') }}
</x-layout>

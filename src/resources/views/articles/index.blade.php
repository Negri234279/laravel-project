<x-layout>
    <h1 class="font-bold text-center">Articles</h1>

    <x-articles-filters :mode="$mode" />

    <x-articles :articles="$articles" :user="$user" />

    {{ $articles->appends(['mode' => $mode])->links('pagination::tailwind') }}
</x-layout>
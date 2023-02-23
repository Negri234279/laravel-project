@props(['to', 'name'])

@php
    $activeClass = 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0 dark:text-white';
    $desactiveClass = 'text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700';
@endphp

<a
    href="{{ $to }}"
    class="block py-2 pl-3 pr-4 rounded {{ Request::is($to) ? $activeClass : $desactiveClass  }}"
>
    {{ $name }}
</a>
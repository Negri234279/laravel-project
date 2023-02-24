@props(['mode'])

<div class="flex justify-between">
    <div class="inline-flex rounded-md shadow-sm mb-4">
        <a href="{{ route('articles.index', ['mode' => 'all']) }}" aria-current="page"
            class="{{ $mode === 'all' ? 'dark:bg-blue-700' : 'dark:bg-gray-700' }} px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
            All
        </a>
        <a href="{{ route('articles.index', ['mode' => 'user']) }}"
            class="{{ $mode === 'user' ? 'dark:bg-blue-700' : 'dark:bg-gray-700' }}
                px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
            Subscribed
        </a>
    </div>
    <div class="flex items-start">
        <a href="{{ route('articles.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            New article
        </a>
    </div>
</div>

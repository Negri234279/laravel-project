@props(['mode', 'user', 'sort'])

<div class="mb-5 flex flex-wrap justify-between">
    <div class="flex gap-6">
        <div class="inline-flex rounded-md shadow-sm">
            <a href="{{ route('articles.index', ['mode' => 'all', 'sort' => 'LASTED']) }}"
                class="{{ $mode === 'all' ? 'dark:bg-blue-700' : 'dark:bg-gray-700' }}
                px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                All
            </a>
            <a href="{{ route('articles.index', ['mode' => 'sub', 'sort' => 'LASTED']) }}"
                class="{{ $mode === 'sub' ? 'dark:bg-blue-700' : 'dark:bg-gray-700' }}
                px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Subscribed
            </a>
        </div>

        <div class="inline-flex rounded-md shadow-sm">
            <a href="{{ route('articles.index', ['mode'  => $mode, 'sort' => 'BODY_ASC']) }}"
                class="{{ $sort === 'BODY_ASC' ? 'dark:bg-blue-700' : 'dark:bg-gray-700' }} px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Text asc
            </a>
            <a href="{{ route('articles.index', ['mode'  => $mode, 'sort' => 'BODY_DESC']) }}"
                class="{{ $sort === 'BODY_DESC' ? 'dark:bg-blue-700' : 'dark:bg-gray-700' }} px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Text desc
            </a>
            <a href="{{ route('articles.index', ['mode'  => $mode, 'sort' => 'LASTED']) }}"
                class="{{ $sort === 'LASTED' ? 'dark:bg-blue-700' : 'dark:bg-gray-700' }} px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Newest
            </a>
            <a href="{{ route('articles.index', ['mode'  => $mode, 'sort' => 'OLDER']) }}"
                class="{{ $sort === 'OLDER' ? 'dark:bg-blue-700' : 'dark:bg-gray-700' }} px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Oldest
            </a>
        </div>
    </div>
    @if ($user->isAdmin())
        <a href="{{ route('articles.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            New article
        </a>
    @endif
</div>
</div>

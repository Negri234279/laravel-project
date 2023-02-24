@props(['articles', 'user'])

<div class="relative mx-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Sport
                </th>
                <th scope="col" class="px-6 py-3">
                    Text
                </th>
                @if ($user->isAdmin())
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr
                    class="border-b bg-gray-50 dark:border-gray-700 {{ $loop->odd ? 'dark:bg-gray-800' : 'dark:bg-gray-900' }}">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $article->sport->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $article->body }}
                    </td>
                    @if ($user->isAdmin())
                        <th class="px-6 py-4 whitespace-nowrap">
                            <div class="flex gap-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                            </a>
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Delete
                            </a>
                            </div>
                        </th>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
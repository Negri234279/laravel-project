<x-layout>
    <h1 class="text-3xl text-center font-extrabold dark:text-white mb-5">Sports</h1>

    @if (session('success'))
        <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="flex flex-wrap justify-center gap-5">
        @foreach ($sports as $sport)
            <div
                class="w-xxs p-6 flex flex-col justify-between gap-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-fit">
                        {{ $sport->name }}
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $sport->description }}.</p>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('sports.edit', ['id' => $sport->id]) }}"
                        class="w-full text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Edit</a>

                    <form class="w-full" action="{{ route('sports.destroy', $sport) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this sport?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>

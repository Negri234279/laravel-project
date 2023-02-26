<x-layout>  
    <div class="flex justify-between mb-6">
        <div></div>
        <h1 class="text-3xl text-center font-extrabold dark:text-white">Sports</h1>
        <a href="{{ route('sports.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            New sport
        </a>
    </div>

    <x-session-alert />

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

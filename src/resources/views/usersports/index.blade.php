<x-layout>
    <h1 class="text-3xl text-center font-extrabold dark:text-white mb-5">Subscriptions</h1>

    <x-session-alert />

    <div class="flex flex-wrap justify-center gap-5">
        @foreach ($userSports as $sport)
            <form action="{{ route('user-sports.destroy', ['id' => $sport->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div
                    class="w-xxs flex flex-col gap-2 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-fit">
                            {{ $sport->name }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $sport->description }}.</p>
                    </div>
                    <button type="submit"
                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Unsubscribe</button>
                </div>
            </form>
        @endforeach

        @foreach ($sports as $sport)
            <form action="{{ route('user-sports.store', ['id' => $sport->id]) }}" method="POST">
                @csrf
                <div
                    class="w-xxs flex flex-col gap-2 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-fit">
                            {{ $sport->name }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $sport->description }}.</p>
                    </div>
                    <button type="submit"
                        class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Subscribe</button>
                </div>
            </form>
        @endforeach
    </div>
</x-layout>

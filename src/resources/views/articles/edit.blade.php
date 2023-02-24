<x-layout>
    <form method="POST" action="{{ route('articles.update', $article) }}" class="max-w-xl mx-auto flex flex-col gap-8">
        @csrf
        @method('put')

        <div>
            <label for="sport_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sport</label>
            <select id="sport_id" name="sport_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($sports as $sport)
                    <option value="{{ $sport->id }}" {{ $article->sport_id == $sport->id ? 'selected' : '' }}>
                        {{ $sport->name }}</option>
                @endforeach
            </select>
            @error('sport_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                message</label>
            <textarea id="message" rows="4" name="body"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Leave a comment...">{{ $article->body }}</textarea>
            @error('body')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update
            Article</button>

    </form>
</x-layout>

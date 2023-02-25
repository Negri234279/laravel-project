<x-layout>
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
    </form>
</x-layout>

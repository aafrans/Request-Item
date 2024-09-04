<form action="{{ route('kategori.destroy', $category->id) }}" method="POST"
    onsubmit="return confirm('Are you sure you want to delete this category?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500 hover:text-red-600">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>

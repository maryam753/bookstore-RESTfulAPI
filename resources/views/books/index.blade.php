@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>All Books <span class="badge bg-secondary">{{ $books->total() }}</span></h2>
    <a href="{{ route('books.create') }}" class="btn btn-dark">+ Add Book</a>
</div>

<form method="GET" action="{{ route('books.index') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control"
               placeholder="Search by title or author..."
               value="{{ request('search') }}">
        <button class="btn btn-dark" type="submit">Search</button>
        @if(request('search'))
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">
                ✕ Clear
            </a>
        @endif
    </div>
</form>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse($books as $book)
    <div class="col">
        <div class="card h-100 book-card">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="text-muted mb-1">by {{ $book->author }}</p>
                <p class="fw-bold text-success fs-5">${{ $book->price }}</p>
                <p class="text-muted small mb-1">ISBN: {{ $book->isbn }}</p>
                <p class="text-muted small">
                    📅 {{ \Carbon\Carbon::parse($book->publishedDate)->format('M d, Y') }}
                </p>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('books.show', $book->id) }}" 
                   class="btn btn-outline-primary btn-sm">View</a>
                <a href="{{ route('books.edit', $book->id) }}" 
                   class="btn btn-outline-warning btn-sm">Edit</a>
                <form action="{{ route('books.destroy', $book->id) }}" 
                      method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <p class="text-muted fs-5">No books yet.</p>
        <a href="{{ route('books.create') }}" class="btn btn-dark">Add First Book</a>
    </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $books->links() }}
</div>

@endsection

@section('scripts')
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Delete this book?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if (result.isConfirmed) form.submit();
        });
    });
});
</script>
@endsection
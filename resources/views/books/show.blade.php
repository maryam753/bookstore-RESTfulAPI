@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">

            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Book Detail</h5>
                <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-light">
                    ← Back
                </a>
            </div>

            <div class="card-body">

                <table class="table table-borderless">
                    <tr>
                        <th width="140">Title</th>
                        <td>{{ $book->title }}</td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td class="text-success fw-bold">${{ $book->price }}</td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>{{ $book->isbn }}</td>
                    </tr>
                    <tr>
                        <th>Published Date</th>
                        <td>{{ \Carbon\Carbon::parse($book->publishedDate)->format('M d, Y') }}</td>
                    </tr>
                </table>

            </div>

            <div class="card-footer d-flex gap-2">
                <a href="{{ route('books.edit', $book->id) }}" 
                   class="btn btn-warning">
                    Edit Book
                </a>
                <form action="{{ route('books.destroy', $book->id) }}" 
                      method="POST" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete Book
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.getElementById('delete-form').addEventListener('submit', function(e) {
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
        if (result.isConfirmed) this.submit();
    }.bind(this));
});
</script>
@endsection
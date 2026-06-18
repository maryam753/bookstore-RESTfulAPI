@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">

            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Add New Book</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" name="author"
                               class="form-control @error('author') is-invalid @enderror"
                               value="{{ old('author') }}">
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price ($)</label>
                        <input type="number" step="0.01" name="price"
                               class="form-control @error('price') is-invalid @enderror"
                               value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ISBN</label>
                        <input type="text" name="isbn"
                               class="form-control @error('isbn') is-invalid @enderror"
                               value="{{ old('isbn') }}">
                        @error('isbn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Published Date</label>
                        <input type="date" name="publishedDate"
                               class="form-control @error('publishedDate') is-invalid @enderror"
                               value="{{ old('publishedDate') }}">
                        @error('publishedDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success w-100">
                            Save Book
                        </button>
                        <a href="{{ route('books.index') }}" 
                           class="btn btn-secondary w-100">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
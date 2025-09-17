@extends('layouts.admin')

@section('content')
    <div class="content-wrapper" style="padding-top: 30px">


        <section class="content">
            <div class="col-md-12 mt-3">
                <!-- Default box -->

                <div class="card">
                    <div class="card-body row">
                        <div class="col-12">
                            <a href="{{ route('book.index') }}" class="btn btn-warning">Back</a>
                            <div class="form-group">
                                <label for="inputName">Author</label>
                                <p class="form-text">{{ $book->author->fullName }}</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputName">Title</label>
                                <p class="form-text">{{ $book->title }}</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <p class="form-text">{{ $book->description }}</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputName">Total Copies</label>
                                <p class="form-text">{{ $book->total_copies }}</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputName">Available Copies</label>
                                <p class="form-text">{{ $book->available_copies }}</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputName">Times Rented</label>
                                <p class="form-text">{{ $book->times_rented }}</p>
                            </div>
                            <hr>
                            <div class="form-group mt-3">
                                <h2 class="form-text">Created: {{ $book->created_at->format('Y/m/d (H:i)') }}</h2>
                                <h2 class="form-text">Updated: {{ $book->updated_at->format('Y/m/d (H:i)') }}</h2>
                            </div>
                        </div>
        </section>
    </div>
@endsection

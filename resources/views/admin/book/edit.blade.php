@extends('layouts.admin')

@section('content')
    <div class="content-wrapper" style="padding-top: 30px">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-warning">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Authors</label>
                                            <select name="author_id" class="form-select">
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->id }}"
                                                        {{ $author->id == $book->author_id ? 'selected' : '' }}>
                                                        {{ $author->fullName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" value="{{ $book->title }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="3">{{ $book->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Total Copies</label>
                                            <input type="number" name="total_copies" value="{{ $book->total_copies }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Create" class="btn btn-primary">
                                    <a href="{{ route('book.index') }}" class="btn btn-warning">Back</a>
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

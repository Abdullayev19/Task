@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <a href="{{ route('book.create') }}" class="btn btn-primary">Add a
                                        book</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>T/R</th>
                                            <th>Title</th>
                                            <th>Total Copies</th>
                                            <th>Available Copies</th>
                                            <th>Authors</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->total_copies == 0 ? 'All copies are rented' : $book->total_copies }}
                                                </td>
                                                <td>{{ $book->available_copies }}</td>
                                                <td>{{ $book->author->fullName }}</td>
                                                <td class="d-flex flex-row">
                                                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-success"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('book.edit', $book->id) }}"
                                                        class="mx-2 btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" value="" class="btn btn-danger ali">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

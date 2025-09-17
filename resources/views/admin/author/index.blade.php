@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <a href="{{ route('author.create') }}" class="btn btn-primary">Create a
                                        Author</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>T/R</th>
                                            <th>Full Name</th>
                                            <th>Biography</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($authors as $author)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $author->fullName }}</td>
                                                <td>{{ $author->biography ? $author->biography : 'Biography not provided' }}
                                                </td>
                                                <td class="d-flex flex-row">
                                                    <a href="{{ route('author.edit', $author->id) }}"
                                                        class="mx-2 btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <form action="{{ route('author.destroy', $author->id) }}"
                                                        method="POST">
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

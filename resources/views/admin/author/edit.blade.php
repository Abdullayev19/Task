@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-warning">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('author.update', $author->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input name="fullName" class="form-control" rows="3"
                                                placeholder="Enter full name ..." value="{{ $author->fullName }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Biography</label>
                                            <textarea name="biography" class="form-control" rows="3">{{ $author->biography }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-primary">
                                        <a href="{{ route('author.index') }}" class="btn btn-warning">Back</a>
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

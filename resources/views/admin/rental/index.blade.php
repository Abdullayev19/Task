@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ijaralar Ro'yxati</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>T/R</th>
                                            <th>Kitob</th>
                                            <th>Muallif</th>
                                            <th>Ism</th>
                                            <th>Telefon</th>
                                            <th>Ijaraga olingan sana</th>
                                            <th>Qaytarish muddati</th>
                                            <th>Xolati</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rentals as $rental)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rental->book->title }}</td>
                                                <td>{{ $rental->book->author->fullName }}</td>
                                                <td>{{ $rental->name }}</td>
                                                <td>{{ $rental->phone }}</td>
                                                <td>{{ $rental->start }}</td>
                                                <td>{{ $rental->finish }}</td>
                                                <td>
                                                    @if ($rental->returned)
                                                        Ha ({{ $rental->returned }})
                                                    @else
                                                        Yo'q
                                                    @endif
                                                </td>
                                                <td class="d-flex flex-row">
                                                    @if (!$rental->returned)
                                                        <form action="{{ route('rental.update', $rental->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="returned"
                                                                value="{{ now() }}">
                                                            <button type="submit"
                                                                class="btn btn-success btn-sm">Qaytarish</button>
                                                        </form>
                                                    @else
                                                        <span class="fw-bold text-success">Qaytarilgan</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

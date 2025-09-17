@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <h2 class="mb-4">Dashboard</h2>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header fw-bold">Hozirda ijarada bo'lgan kitoblar</div>
                            <div class="card-body">
                                <h4>{{ $rentalsCount }} ta kitob ijarada</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header fw-bold">Eng ko'p o'qilgan kitoblar</div>
                            <div class="card-body">
                                <ul>
                                    @foreach ($topBooks as $book)
                                        <li>{{ $book->title }} ({{ $book->times_rented }} marta ijaraga olingan)</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header fw-bold">Mualliflar va kitoblari soni</div>
                            <div class="card-body">
                                <ul>
                                    @foreach ($authorsStats as $author)
                                        <li>{{ $author->fullName }}: {{ $author->books_count }} ta kitob</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Rental</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('rental.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_id" class="form-label">Kitob</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    <option value="">Tanlang</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->available_copies }} mavjud)
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Ism-sharif</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefon raqam</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">Ijaraga olingan sana</label>
                <input type="datetime-local" name="start" class="form-control"
                    value="{{ now()->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="mb-3">
                <label for="finish" class="form-label">Qaytarish muddati</label>
                <input type="datetime-local" name="finish" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Olish</button>
        </form>
    </div>
</body>

</html>

# # Laravel Kutubxona Tizimi

Bu loyiha **Laravel 10** yordamida yaratilgan Kutubxona Tizimi.  
U **kitoblar**, **mualliflar** va **ijaralar**ni samarali boshqarish imkonini beradi, veb va API interfeyslari bilan.

---

## Asosiy Xususiyatlar

### Web Kontrollerlar
- **PageController**
  - `index()`: Asosiy sahifada mavjud kitoblar ro‘yxatini ko‘rsatadi (available_copies > 0).
- **AdminController**
  - `index()`: Admin paneli:
    - Eng ko‘p ijaraga olingan 5 ta kitob.
    - Har bir muallifning kitoblar statistikasi.
    - Joriy holatda ijarada bo‘lgan kitoblar soni.
- **AuthorController**
  - `index()`: Mualliflar ro‘yxati.
  - `create()`: Muallif qo‘shish sahifasi.
  - `store(Request $request)`: Muallif yaratish va validatsiya.
  - `edit($id)`: Muallifni tahrirlash sahifasi.
  - `update(Request $request, $id)`: Muallifni yangilash.
  - `destroy($id)`: Muallifni o‘chirish.
- **BookController**
  - `index()`: Kitoblar ro‘yxati.
  - `create()`: Kitob qo‘shish sahifasi.
  - `store(Request $request)`: Kitob yaratish va available_copies ni total_copies bilan tenglash.
  - `show($id)`: Kitobni ko‘rish.
  - `edit($id)`: Kitobni tahrirlash sahifasi.
  - `update(Request $request, $id)`: Kitobni yangilash.
  - `destroy($id)`: Kitobni o‘chirish.
- **RentalController**
  - `index()`: Ijaraga olingan kitoblar va foydalanuvchilar ro‘yxati.
  - `store(Request $request)`: Kitobni ijaraga berish (available_copies kamayadi, times_rented oshadi).
  - `update(Request $request, $id)`: Kitobni qaytarilgan deb belgilash.

### API Kontrollerlar
- **Api\RentalController**
  - `index()`: Mavjud kitoblar va muallif nomlarini JSON formatida qaytaradi.
  - `store(Request $request)`: Kitobni ijaraga olish uchun JSON so‘rovini qabul qiladi.
    - Validatsiya: `book_id`, `name`, `phone`, `start`, `finish`.
    - Javob misoli:
    ```json
    {
      "success": "Kitob ijaraga berildi!",
      "rental": {
        "id": 12,
        "book_name": "O‘tgan kunlar",
        "name": "Ali",
        "phone": "998901234567",
        "start": "2025-09-17 10:00:00",
        "finish": "2025-09-24 10:00:00"
      }
    }
    ```

---

## Modellar va Munosabatlar

- **Author**
  - `fillable`: `fullName`, `biography`
  - `books()`: `hasMany` (bir muallifning ko‘p kitoblari bo‘lishi mumkin)
- **Book**
  - `fillable`: `author_id`, `title`, `description`, `total_copies`, `available_copies`, `times_rented`
  - `author()`: `belongsTo`
- **Rental**
  - `fillable`: `name`, `phone`, `book_id`, `start`, `finish`, `returned`
  - `book()`: `belongsTo`
  - Yordamchi metodlar: `isReturned()`, `isOverdue()`

---

## Yo‘llar (Routes)

### Web Yo‘llar (`web.php`)
```php
Route::get('/', [PageController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::resource('author', AuthorController::class)->middleware('auth');
Route::resource('book', BookController::class)->middleware('auth');
Route::resource('rental', RentalController::class)->middleware('auth');


API Yo‘llar (api.php)
Route::apiResource('rentalapi', Api\RentalController::class);


API Foydalanish
GET /api/rentalapi

Mavjud kitoblar va muallif nomlarini olish.
Javob misoli:
[
  {
    "id": 1,
    "author_name": "Abdulla Qodiriy",
    "title": "O‘tgan kunlar",
    "available_copies": 5
  }
]


POST /api/rentalapi
Kitobni ijaraga olish.

So‘rov misoli:

{
  "book_id": 1,
  "name": "Ali",
  "phone": "998901234567",
  "start": "2025-09-17 10:00:00",
  "finish": "2025-09-24 10:00:00"
}


Javob misoli:

{
  "success": "Kitob ijaraga berildi!",
  "rental": {
    "id": 12,
    "book_name": "O‘tgan kunlar",
    "name": "Ali",
    "phone": "998901234567",
    "start": "2025-09-17 10:00:00",
    "finish": "2025-09-24 10:00:00"
  }
}

O‘rnatish (Installation)

Repozitoriyani klonlash:

git clone https://github.com/username/laravel-project.git


Loyihaga o‘tish:

cd laravel-project


Bog‘liqliklarni o‘rnatish:

composer install
npm install
npm run dev


.env.example faylini .env ga nusxalash va ma’lumotlar bazasini sozlash:
cp .env.example .env
php artisan key:generate


Migratsiyalarni bajarish:
php artisan migrate

(Ixtiyoriy) Ma’lumotlar bazasini namunaviy ma’lumotlar bilan to‘ldirish:
php artisan db:seed


Ishlab chiqish serverini ishga tushurish:
php artisan serve


Brauzeringizda http://localhost:8000 manziliga o‘ting.


Ishlatilgan Texnologiyalar

PHP 8.x
Laravel 10
MySQL
Composer & NPM
Blade Templating Engine
Bootstrap 5

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;


Route::get('/', function () {
    return view('index', ['title' => 'Beranda']);
})->name('home');

Route::redirect('/index', '/', 301);
Route::get('/404', function () {
    return view('404', ['title' => 'Kesalahan 404']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'Tentang Kami']);
});
Route::get('/activity', function () {
    return view('activity', ['title' => 'Aktivitas']);
});
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/contact', function () {
    return view('contact', ['title' => 'Kontak']);
});
Route::get('/event', [EventController::class, 'index'])->name('events.index');
Route::get('/events/fetch', [EventController::class, 'fetch'])->name('events.fetch');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/blog/posts', [BlogController::class, 'store'])->name('blog.store');
    Route::put('/blog/posts/{blogPost}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/posts/{blogPost}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::post('/gallery/items', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('/gallery/items/{galleryItem}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/items/{galleryItem}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    Route::post('/event', [EventController::class, 'store'])->name('events.store');
    Route::put('/event/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/event/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::post('/event/holidays', [EventController::class, 'storeHoliday'])->name('events.holidays.store');
    Route::put('/event/holidays/{holiday}', [EventController::class, 'updateHoliday'])->name('events.holidays.update');
    Route::delete('/event/holidays/{holiday}', [EventController::class, 'destroyHoliday'])->name('events.holidays.destroy');
});
Route::get('/sermon', function () {
    return view('sermon', ['title' => 'Kajian',]);
});
Route::get('/team', function () {
    return view('team', ['title' => 'Pengurus']);
});
Route::get('/testimonial', function () {
    return view('testimonial', ['title' => 'Para Ahli']);
});
Route::get('/donation', function () {
    return view('donation', ['title' => 'Donasi Masjid']);
});
Route::get('/pengembangan-masjid', function () {
    return view('pengembangan-masjid', ['title' => 'Pengembangan Masjid']);
});
Route::get('/kajian-quran', function () {
    return view('kajian-quran', ['title' => 'Kajian Quran']);
});
Route::get('/hadits-sunnah', function () {
    return view('hadits-sunnah', ['title' => 'Hadits & Sunnah']);
});
Route::get('/kajian-malam', function () {
    return view('kajian-malam', ['title' => 'Kajian Malam']);
});
Route::get('/bantu-anak-panti', function () {
    return view('bantu-anak-panti', ['title' => 'Bantu Anak Panti']);
});
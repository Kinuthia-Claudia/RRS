<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Customer\MyreservationsController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\TestimonialController as FrontendTestimonialController;
use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/testimonials', [FrontendTestimonialController::class,'index'])->name('testimonials.index');
Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');
Route::post('/testimonials/sort', [FrontendTestimonialController::class, 'sortTestimonials'])->name('testimonials.sort');
Route::get('/api/sort-reviews', [FrontendTestimonialController::class, 'sortReviews'])->name('sort.reviews');
Route::get('/contactus', [WelcomeController::class, 'contactus'])->name('contactus');
Route::post('/contactus', [WelcomeController::class, 'submitContactForm'])->name('submit-contact-form');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
    Route::resource('/analytics', AnalyticsController::class);
    Route::resource('/users', UsersController::class);



});
Route::post('admin/reservations/{id}/change-status', [ReservationController::class, 'changeStatus'])->name('admin.reservations.changeStatus');
Route::put('admin/reservation-settings', [ReservationController::class, 'updateSettings'])->name('admin.update_reservation_settings');
Route::get('admin/reservation/settings', [ReservationController::class, 'settings'])->name('admin.reservation.settings');


Route::middleware(['auth'])->name('customer.')->prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::resource('/myreservations',MyreservationsController::class);
    Route::resource('/reviews',ReviewController::class);
    Route::resource('/profile',ProfileController::class);

});

require __DIR__ . '/auth.php';

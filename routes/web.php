<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Middleware\TrackVisitor;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// Public portfolio
Route::get('/', [PortfolioController::class, 'index'])->middleware(TrackVisitor::class)->name('portfolio');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact');

// Admin auth
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('skills', SkillController::class)->except(['show']);
        Route::resource('experiences', ExperienceController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('projects', ProjectController::class)->except(['show']);

        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/live-visitors', function () {
            return response()->json([
                'today' => \App\Models\PageVisit::totalToday(),
                'total' => \App\Models\PageVisit::totalAllTime(),
            ]);
        })->name('live.visitors');
    });
});

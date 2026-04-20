<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\AdminController;

// Main invitation routes
Route::get('/', [InvitationController::class, 'index'])->name('home');
Route::get('/undangan/{slug}', [InvitationController::class, 'showPersonalized'])->name('invitation.personal');
Route::get('/ngunduh-mantu', [InvitationController::class, 'ngunduhMantu'])->name('ngunduh-mantu');
Route::get('/ngunduh-mantu/{slug}', [InvitationController::class, 'showPersonalizedNgunduhMantu'])->name('ngunduh-mantu.personal');
Route::post('/rsvp', [InvitationController::class, 'storeRSVP'])->name('rsvp.store');
Route::post('/wishes', [InvitationController::class, 'storeWish'])->name('wishes.store');

// Hidden Admin Panel - access by typing URL manually: /admin-fira-eko
Route::get('/admin-fira-eko', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin-fira-eko/rsvp', [AdminController::class, 'rsvpIndex'])->name('admin.rsvp');
Route::get('/admin-fira-eko/guests', [AdminController::class, 'guestsIndex'])->name('admin.guests');
Route::post('/admin-fira-eko/delete-wish/{id}', [AdminController::class, 'deleteWish'])->name('admin.delete.wish');
Route::post('/admin-fira-eko/add-guest', [AdminController::class, 'addGuest'])->name('admin.guest.add');
Route::post('/admin-fira-eko/delete-guest/{id}', [AdminController::class, 'deleteGuest'])->name('admin.guest.delete');
Route::get('/admin-fira-eko/download-template', [AdminController::class, 'downloadTemplate'])->name('admin.download.template');
Route::get('/admin-fira-eko/download-rsvp', [AdminController::class, 'downloadRsvp'])->name('admin.download.rsvp');
Route::post('/admin-fira-eko/import-guests', [AdminController::class, 'importGuests'])->name('admin.import.guests');
Route::post('/admin-fira-eko/toggle-wa/{id}', [AdminController::class, 'toggleWaSent'])->name('admin.guest.toggle-wa');
Route::post('/admin-fira-eko/toggle-rsvp-wa/{id}', [AdminController::class, 'toggleRsvpWaSent'])->name('admin.rsvp.toggle-wa');
Route::post('/admin-fira-eko/toggle-wa-ajax/{id}', [AdminController::class, 'toggleWaSentAjax'])->name('admin.guest.toggle-wa-ajax');
Route::post('/admin-fira-eko/toggle-rsvp-wa-ajax/{id}', [AdminController::class, 'toggleRsvpWaSentAjax'])->name('admin.rsvp.toggle-wa-ajax');
Route::get('/admin-fira-eko/wa-settings', [AdminController::class, 'waSettings'])->name('admin.wa.settings');
Route::post('/admin-fira-eko/wa-settings', [AdminController::class, 'saveWaSettings'])->name('admin.wa.settings.save');
Route::get('/admin-fira-eko/wa-template', [AdminController::class, 'getWaTemplateApi'])->name('admin.wa.template');
Route::post('/admin-fira-eko/update-guest/{id}', [AdminController::class, 'updateGuest'])->name('admin.guest.update');




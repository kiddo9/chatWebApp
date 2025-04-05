<?php

use App\Livewire\Form;
use App\Livewire\LoginForm;
use App\Livewire\Messages;
use App\Livewire\Profile;
use App\Livewire\Search;
use App\Livewire\Settings;
use App\Livewire\Stories;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/messages', Messages::class)->lazy()->middleware('auth');
Route::get('/users', Users::class)->lazy()->middleware('auth');
Route::get('/search', Search::class)->lazy()->middleware('auth');
Route::get('/settings', Settings::class)->lazy()->middleware('auth');
Route::get('/', Form::class)->lazy()->name('register');
Route::get('/stories', Stories::class)->lazy()->middleware('auth');
Route::get('/login', LoginForm::class)->lazy()->name('login');
Route::get('/profile/{id}', Profile::class)->lazy()->middleware('auth');
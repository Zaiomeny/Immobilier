<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Welcome;
use App\Livewire\Posts\PostsList;
use App\Livewire\Posts\UpdatePost;
use App\Livewire\Categories\CategoriesList;
use App\Livewire\Home\Homepage;
use App\Livewire\User\FollowedUserList;
use App\Livewire\User\UserProfile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', Welcome::class)->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () use ($idRegex, $slugRegex) {
    //Dashboard starts
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    /*
    /Dashboard ends
    /Posts starts
    */
    Route::get('/posts/index', PostsList::class)
        ->name('posts.index');
    Route::get('/post/{post}/show/{slug}/', [PostController::class, 'show'])
        ->name('post.show')
        ->where([
            'post' => $idRegex,
            'slug' => $slugRegex
        ]);
    Route::post('post/{post}/contact', [ContactController::class, 'contact_me'])
            ->where(['post' => $idRegex])->name('post.contact');
    Route::get('/post/{post}/edit/{slug}/', UpdatePost::class)
        ->name('post.edit')
        ->where([
            'post' => $idRegex,
            'slug' => $slugRegex
        ]);
    /*
    /Posts ends
    /Actualités starts
    */
    Route::get('actualites', Homepage::class)->name('actualites');
    /*
    *Actualités ends
    *Catégories starts
    */
    Route::get('/categories/index', CategoriesList::class)
        ->name('categories.index');
    /** Catégories ends
     * UserProfile
    */
    Route::get('/user-profile/{user}',UserProfile::class)
        ->name('user.profile');
        Route::get('/followed-users',FollowedUserList::class)
        ->name('user.followed');
});

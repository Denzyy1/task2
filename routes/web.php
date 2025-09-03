<?php
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\ColorTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users' , [ UserController::class , 'index']);

Route::get('/users/{id}', [UserController::class , 'show'])->where('id', '[0-9]+');

//Route::get('degree/{result}/{student_name}', function($degree , $student_name));

// Route::get('success',function(){
//     return view('success');
// });

// Route::get('failed',function(){
//     return view('failed');
// });



// Route::middleware('color_test')->get('color/{color}' , [ColorController::class , 'check'])->name('color');
// Route::get('home' , function(){
//     return view('home');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::view('my-dashboard', 'dashboard-layout');

Route::view('/test','test');



Route::get('/users', function () {
    $users = User::all();
    return view('users', compact('users'));
})->name('users.index');

Route::get('/users/create', function () {
    return view('create-users');
})->name('users.create');


Route::post('/users', function (Request $request) {
   
    return redirect()->route('users.index')->with('success', 'User created successfully!');
});


Route::get('/profile', function () {
    $user = Auth::user(); 

    return view('profile', compact('user'));
})->middleware('auth')->name('profile');


Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
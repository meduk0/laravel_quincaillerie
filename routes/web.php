<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*Route::get('/start/view', function () {
    return view(view: 'activities');//'<h1>Hello, I am your starting page</h1>';// view('welcome');
})->name('acts');*/

Route::resource('/products', ProductController::class);

//Route::get('/products/search', [ProductController::class, "search"])->name('products.search');
Route::post('/products/search', [ProductController::class, "search"])->name('products.search');
Route::get('/products/{product}/image', [ProductController::class, 'image'])->name('products.image');

Route::get('getform', function () {
    return view('form');
});

Route::get('/{name}', function ($name) {
    return view('activities')->with('name', $name);
})->name('acts')->where(['name' => '[a-zA-Z]+']);

Route::get('/{name}/{age}', function ($name, $age) {
    return view('activities')->with('name', $name)
        ->with('age', $age);
})->name('acts')->where(['name' => '[a-zA-Z]+', 'age' => '[0-9]{1,2}']);

/*Route::get('afficher_form', function (){
    return view('view')->with('success','aa');
})->name('aform');*/

/*Route::get('/{name}/{age}', function ($name, $age) {
    return view( 'activities', compact('name', 'age'));
})->name('acts')->where(['name' => '[a-zA-Z]+', 'age' => '[0-9]{1,2}']);*/

/*Route::get('/{name}/{age}', function ($name, $age) {
    return view( 'activities', ['username' => $name, 'age' => $age]);
})->name('acts')->where(['name' => '[a-zA-Z]+', 'age' => '[0-9]{1,2}']);*/

Route::get('/start-view', function () {
    return view(view: 'start'); // '<h1>Hello, I am your starting page</h1>';// view('welcome');
})->name('start');

// Route::post('/indexed', [VerifController::class, "verify"]);//->name('ind');

/*Route::get('/{name}', function ($name) {
    return view( 'activities', ['username' => $name]);
})->name('acts')->where(['name' => '[a-zA-Z]+']);*/

Route::get('/', function () {
    return view(view: 'activities'); // '<h1>Hello, I am your starting page</h1>';// view('welcome');
})->name('acts');

Route::fallback(function () {
    // return redirect()->route('start.view');
    return redirect('/');
});

use Illuminate\Support\Facades\Redis;

Route::get('test-redis', function () {
    try {
        Redis::set('test_key', 'test_value');
        $value = Redis::get('test_key');
        Redis::del('test_key');

        if ($value === 'test_value') {
            return 'Redis connection successful!';
        } else {
            return 'Redis connection failed: Value mismatch.';
        }
    } catch (Exception $e) {
        return 'Redis connection error: '.$e->getMessage();
    }
});

use Illuminate\Support\Facades\Cache;

Route::get('/test-cache', function () {
    try {
        Cache::put('cache_test_key', 'cached_value', 60); // Cache for 60 seconds
        $value = Cache::get('cache_test_key');
        Cache::forget('cache_test_key'); // Clean up

        if ($value === 'cached_value') {
            return 'Redis cache connection successful!';
        } else {
            return 'Redis cache connection failed: Value mismatch.';
        }
    } catch (\Exception $e) {
        return 'Redis cache connection error: '.$e->getMessage();
    }
});

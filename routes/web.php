<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add', function () {
    return Inertia::render('Add');
})->middleware(['auth', 'verified'])->name('add');

Route::post('add', function() {
    // return ;
    $data = OpenGraph::fetch(Request::get('address'), true);
    if(!empty($data['product:price:amount'])) {
        $data['price'] = $data['product:price:amount'];
    }
    
    return Inertia::render('Add', [
        'data' => $data,
      ]);
    //     return $data;
})->name('getData');


// public function getData(){

//     $data = OpenGraph::fetch("https://www.digikala.com/product/dkp-4430964/%D9%87%D8%AF%D9%81%D9%88%D9%86-yefe-%D9%85%D8%AF%D9%84-809");

//     return $data;
// }

require __DIR__.'/auth.php';

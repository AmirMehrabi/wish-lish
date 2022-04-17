<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ItemController;
use App\Models\Item;
use App\Models\User;

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

Route::get('qr-code-g', function () {
  
    $code = \QrCode::size(500)
            ->format('png')
            ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
    
            return Inertia::render('Profile', [
                'code' => $code
            ]);
    
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        
        'items' => Item::where('user_id', auth()->user()->id)->get()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/wl/{slug}', function ($slug) {
    $user = User::where('slug', $slug)->firstOrFail();
    return Inertia::render('Wishlist', [
        'user' => $user,
        'items' => Item::where('user_id', $user->id)->get()
    ]);
})->name('wishlist');



Route::get('/list/{id}/{slug}', function ($id, $slug) {
    $user = User::where('slug', $slug)->firstOrFail();
    
    return Inertia::render('List', [
        'items' => Item::where('user_id', $id)->get(),
        'person' => $user,
    ]);
})->name('list');

Route::get('/add', function () {
    return Inertia::render('Add');
})->middleware(['auth', 'verified'])->name('add');

Route::get('test', function() { 
    return $tags = get_meta_tags('https://www.digikala.com/product/dkp-7866666/%D8%AF%D8%B1%DB%8C%D9%84-%D9%BE%DB%8C%DA%86-%DA%AF%D9%88%D8%B4%D8%AA%DB%8C-%D9%84%D9%88%DA%A9%D8%B3-%D9%85%D8%AF%D9%84-3240/');
    $data = OpenGraph::fetch("https://www.digikala.com/product/dkp-7866666/%D8%AF%D8%B1%DB%8C%D9%84-%D9%BE%DB%8C%DA%86-%DA%AF%D9%88%D8%B4%D8%AA%DB%8C-%D9%84%D9%88%DA%A9%D8%B3-%D9%85%D8%AF%D9%84-3240/",    true, 
    null, 
    null, 
    'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36'
 );
    // dd($data) ;
});


Route::post('add', function() {
    Request::validate([
        'address' => ['required' , 'regex:/[(http|ftp|https)]*[www.]*digikala.com/m'],
    ]);
    $data = OpenGraph::fetch(Request::get('address'), true);
    if(!empty($data['product:price:amount'])) {
        $data['price'] = $data['product:price:amount'] / 10;
    }
    
    return Inertia::render('Add', [
        'url' => Request::get('address'),
        'data' => $data,
      ]);
    //     return $data;
})->name('getData');

Route::post('item/{item}/reserve', [ItemController::class, 'reserve']);

Route::resource('item', ItemController::class);


// public function getData(){

//     $data = OpenGraph::fetch("https://www.digikala.com/product/dkp-4430964/%D9%87%D8%AF%D9%81%D9%88%D9%86-yefe-%D9%85%D8%AF%D9%84-809");

//     return $data;
// }

require __DIR__.'/auth.php';

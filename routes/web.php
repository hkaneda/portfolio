<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ViewController;

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
    return view('top');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard');

    require __DIR__ . '/admin.php';
});
// ユーザー情報登録確認ページ
Route::get('/register_confirm/', [RegisterController::class, 'register_confirm']);
// 商品一覧ページの表示
Route::resource('/items', ItemController::class);
// 商品詳細ページの表示
Route::get('/items/detail/{id}', [ItemController::class, 'show'])->name('item.show');
// カートページの表示
Route::get('/cart', [CartController::class, 'index'])->middleware(['auth'])->name('cart.index');

// カートに商品を入れる
Route::post('/cart/add', [CartController::class, 'store'])->middleware(['auth'])->name('cart.store');
// カートから商品を削除する
Route::delete('/cart/delete', [CartController::class, 'destroy'])->middleware(['auth'])->name('cart.destroy');
// カートのデータを購入履歴に格納する&購入完了処理をする
Route::post('cart/checkout', [CartController::class, 'buyRecord'])->middleware(['auth']);
// 購入履歴を表示する
Route::get('/history', [HistoryController::class, 'showHistory'])->middleware(['auth']);
// お気に入りに入っている商品を表示させる
Route::get('/favorites/index', [FavoriteController::class, 'index'])->middleware(['auth'])->name('favorite.index');
// 商品をお気に入りに追加する
Route::post('/favorites/add', [FavoriteController::class, 'store'])->middleware(['auth'])->name('favorite.store');
// 商品をお気に入りから削除する
Route::delete('/favorites/delete', [FavoriteController::class, 'destroy'])->middleware(['auth'])->name('favorite.destroy');

// 管理者メニューページを表示させる。
Route::get('admin/index', [AdminController::class, 'index'])->middleware(['auth:admin'])->name('admin.index');
// 管理者を新規登録するフォームを表示させる
Route::get('/admin/create', [AdminController::class, 'create'])->middleware(['auth:admin'])->name('admin.create');
// 管理者を新規登録する
Route::post('/admin/add', [AdminController::class, 'store'])->middleware(['auth:admin'])->name('admin.store');
// 管理者を削除するためのフォームを表示させる
Route::get('admin/delete', [AdminController::class, 'adminDelete'])->middleware(['auth:admin']);
// 管理者を削除する前の確認画面を表示させる
Route::post('/admin/delete/confirm', [AdminController::class, 'adminDeleteConfirm'])->middleware(['auth:admin']);
// 管理者を削除する
Route::delete('/admin/destroy', [AdminController::class, 'destroy'])->middleware(['auth:admin'])->name('admin.destroy');
// 管理者用の商品情報と検索フォームを表示させる
Route::get('/admin/items/index', [ShopController::class, 'index'])->middleware(['auth:admin'])->name('admin_shop.index');
//商品を新規登録するためのフォームを表示させる
Route::get('/admin/items/create', [ShopController::class, 'create'])->middleware(['auth:admin'])->name('admin_shop.create');
// 商品の新規登録処理をする
Route::post('/admin/items/store', [ShopController::class, 'store'])->middleware(['auth:admin']);
// 商品情報を編集するフォームと商品の情報を一覧表示させる
Route::get('/admin/items/edit', [ShopController::class, 'edit'])->middleware(['auth:admin'])->name('admin_shop.edit');
// 商品情報の更新処理をする
Route::PATCH('/admin/items/update', [ShopController::class, 'update'])->middleware(['auth:admin'])->name('admin_shop_update');
// 商品情報削除処理の確認画面を表示させる
Route::get('/admin/detele/confirm', [ShopController::class, 'destroyConfirm'])->middleware(['auth:admin'])->name('admin_delete.confirm');
// 商品情報の削除処理をする
Route::delete('/admin/items/delete', [ShopController::class, 'destroy'])->middleware(['auth:admin'])->name('admin_items_destroy');
// ユーザーのお気に入り情報を表示させる
Route::get('/admin/favorites/index', [ViewController::class, 'favoriteIndex'])->middleware(['auth:admin'])->name('admin_favorite_index');
// ユーザーの購入履歴を表示させる
Route::get('/admin/history/index', [ViewController::class, 'showHistory'])->middleware(['auth:admin'])->name('admin_history_index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

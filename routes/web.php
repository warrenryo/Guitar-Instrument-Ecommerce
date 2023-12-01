<?php

use App\Http\Controllers\PriceSort;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GearController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WarrenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyOrdersController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\TrackOrderController;
use App\Http\Controllers\ViewProductController;
use App\Http\Controllers\GearCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\FrontEnd\BuyProductsController;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

//FRONT END ROUTES
Route::get('/', [FrontEndController::class, 'index']); 
Route::get('/category/{category_id}', [FrontEndController::class, 'viewProducts']);
Route::get('/brands/{brand_id}', [FrontEndController::class, 'viewBrands']);
Route::get('/gear/accessory/{gear_id}', [FrontEndController::class,'viewGear']);
Route::get('/gear/allAccessory', [FrontEndController::class,'viewAllAccessory']);
Route::get('/gear/string/{string_id}', [FrontEndController::class, 'viewGearString']);
Route::get('gear/allStrings', [FrontEndController::class, 'viewAllStrings']);
Route::get('gear/guitar-effects/{gEffects_id}', [FrontEndController::class, 'viewGuitarEffects']);
Route::get('gear/allGuitarEffects', [FrontEndController::class, 'viewAllGuitarEffects']);

//BUY NOW PRODUCTS
Route::get('buyNow/{product_slug}', [BuyProductsController::class,'buyGuitars']);
Route::get('checkout/{accessory_slug}', [BuyProductsController::class, 'buyAccessories']);
Route::post('orders', [BuyProductsController::class, 'checkout']);
Route::get('checkout/strings/{string_slug}', [BuyProductsController::class, 'buyStrings']);
Route::get('checkout/guitar-effects/{guitarE_slug}', [BuyProductsController::class, 'buyGuitarEffects']);
Route::post('one-order', [BuyProductsController::class, 'oneOrder']);

//GET PRODUCTS
Route::get('products/{product_slug}', [ViewProductController::class,'viewGuitarProducts']);
Route::get('accessories/{accessory_slug}', [ViewProductController::class, 'viewAccessoryProducts']);
Route::get('strings/{string_slug}', [ViewProductController::class, 'viewStringProducts']);
Route::get('guitar-effects/{guitarE_slug}', [ViewProductController::class, 'viewGuitarEffectsProducts']);


//WISHLIST
Route::post('wishlist/{product_id}', [WishlistController::class, 'addWishlist']);
Route::post('cart/{accessory_id}', [WishlistController::class, 'addAccessoryCart']);
Route::get('cart', [WishlistController::class, 'showCart']);
Route::delete('deleteCart', [WishlistController::class, 'deleteCart']);

//CHECKOUT CART
Route::post('checkout/cart/{user_id}', [BuyProductsController::class, 'checkoutCart']);

//CHECKOUT ONE PRODUCT
Route::get('oneProduct-checkout/guitars/{product_slug}',[BuyProductsController::class, 'buyOneProduct']);
Route::get('oneProduct-checkout/accessories/{accessory_slug}',[BuyProductsController::class, 'buyOneAccessory']);
Route::get('oneProduct-checkout/strings/{string_slug}', [BuyProductsController::class, 'buyOneString']);
Route::get('oneProduct-checkout/guitarEffects/{guitarEffects_slug}', [BuyProductsController::class, 'buyOneGuitarEffects']);

//MY ORDERS
Route::get('my-orders', [MyOrdersController::class, 'myOrders']);
Route::get('view-myOrders/{order_id}', [MyOrdersController::class, 'viewMyOrders']);

//ORDER SUMMARY
Route::get('/order-summary/{order_id}', [BuyProductsController::class, 'showOrderSummary'])->name('orderSummary');//ON ONE PRODUCT
Route::get('/orderSummary/{order_id}', [BuyProductsController::class, 'viewOrderSummary'])->name('order.summary');//ON CART PRODUCT

//PRODUCT SORT
Route::get('productSort', [PriceSort::class, 'priceSort']);

//TRACK ORDERS
Route::get('track-order', [TrackOrderController::class, 'trackOrderIndex']);
Route::post('track-order-submit', [TrackOrderController::class, 'getTrackOrder']);

//NEW PRODUCTS
Route::get('new-products', [FrontEndController::class, 'newProductIndex']);

//SEARCH PRODUCT
Route::get('search', [FrontEndController::class, 'searchProducts']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ADMIN PANEL ROUTES
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [DashboardController::class,'index']);//ADMIN DASHBOARD

    //Category Routes
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('category/viewCategory', [CategoryController::class, 'viewCategory']);
    Route::post('addCategory', [CategoryController::class, 'store']);
    Route::get('category/{item}/edit', [CategoryController::class, 'edit']);
    Route::put('editCategory/{item}', [CategoryController::class, 'update']);
    Route::delete('deleteCategory', [CategoryController::class, 'delete']);

    //Gear Category Routes
    Route::get('gearCategory/accessories', [GearCategoryController::class, 'index']);//ACCESSORIES
    Route::post('addAccessoryCategory', [GearCategoryController::class, 'addAccessory']);//ACCESSORIES
    Route::get('editAccessoryCategory/{accessoryCat_id}', [GearCategoryController::class, 'editAccessory']);//ACCESSORIES
    Route::put('updateAccessoryCategory/{accessoryCat_id}', [GearCategoryController::class, 'updateAccessory']);
    Route::delete('deleteAccessoryCategory', [GearCategoryController::class, 'deleteAccessory']);
    Route::get('stringCategory/strings', [GearCategoryController::class, 'stringCategoryIndex']); //String Category
    Route::post('addStringCategory', [GearCategoryController::class, 'addStringCat']);
    Route::get('editStringCategory/{string_id}', [GearCategoryController::class, 'editStringCat']);
    Route::put('updateStringCategory/{string_id}', [GearCategoryController::class, 'updateStringCat']);
    Route::delete('deleteStringCategory', [GearCategoryController::class, 'deleteStringCat']);
    Route::get('guitarEffectsCategory/guitarEffects', [GearCategoryController::class, 'guitarEffectsIndex']);//Guitar Effects Category
    Route::post('addGuitarEffectsCategory', [GearCategoryController::class, 'addGuitarEffects']);
    Route::get('guitarEffectsCategoryEdit/{ge_id}', [GearCategoryController::class, 'guitarEffectsCategoryEdit']);
    Route::put('updateGuitarEffectsCategory/{ge_id}', [GearCategoryController::class, 'updateGuitarEffectsCategory']);
    Route::delete('deleteGuitarEffectsCategory', [GearCategoryController::class, 'deleteGuitarEffectsCategory']);

    //BRANDS ROUTES
    Route::get('brands', [BrandsController::class, 'index']);

    //PRODUCT ROUTES
    Route::get('products', [ProductController::class, 'index']);
    Route::post('addProduct', [ProductController::class, 'addProduct']);
    Route::get('products/{product}/edit', [ProductController::class, 'editProduct']);
    Route::put('updateProduct/{product}', [ProductController::class, 'updateProduct']);
    Route::delete('deleteProduct', [ProductController::class, 'deleteProduct']);
    Route::get('delete-image/{delete_prod_img}/delete', [ProductController::class, 'deleteImage']);

    //SLIDER ROUTES
    Route::get('slider', [SliderController::class, 'index']);
    Route::post('addSlider', [SliderController::class, 'addSlider']);
    Route::get('editSlider/{slider}/edit', [SliderController::class, 'editSlider']);
    Route::put('updateSlider/{slider_id}', [SliderController::class, 'updateSlider']);
    Route::delete('deleteSlider', [SliderController::class, 'deleteSlider']);

    //GEAR ROUTES

    //accessory
    Route::get('accessory', [GearController::class, 'index']);
    Route::post('addAccessory', [GearController::class, 'store']);
    Route::get('editAccessory/{acc_id}/edit', [GearController::class, 'editAccessory']);
    Route::put('updateAccessory/{accessory_id}', [GearController::class, 'updateAccessory']);
    Route::get('delete-img/{delete_acc_img}/delete', [GearController::class, 'deleteAccessoryImage']);
    Route::delete('deleteAccessory', [GearController::class, 'deleteAccessory']);

    //strings
    Route::get('strings', [GearController::class, 'stringIndex']);
    Route::post('addString', [GearController::class, 'addString']);
    Route::get('editString/{string_id}', [GearController::class, 'editString']);
    Route::put('updateString/{string_id}', [GearController::class, 'updateString']);
    Route::get('delete-img/{img_id}/deleteImg', [GearController::class, 'deleteStringImage']);
    Route::delete('deleteString', [GearController::class, 'deleteString']);

    //guitar effects
    Route::get('guitarEffects', [GearController::class, 'guitarEffectsIndex']);
    Route::post('addGuitarEffects', [GearController::class, 'addGuitarEffects']);
    Route::get('editGuitarEffects/{gEffects_id}', [GearController::class, 'editGuitarEffects']);
    Route::put('updateGuitarEffects/{gEffects_id}', [GearController::class, 'updateGuitarEffects']);
    Route::get('delete-image/{img_id}', [GearController::class, 'deleteGuitarImg']);
    Route::delete('deleteGuitarEffects', [GearController::class, 'deleteGuitarEffects']);

    //ORDERS
    Route::get('today-orders', [DashboardController::class, 'viewOrders']);
    Route::get('view-orders/{order_id}', [OrdersController::class, 'viewOrder']);
    Route::get('pendingOrders', [DashboardController::class, 'viewPendingOrders']);
    Route::get('orderPlaced', [DashboardController::class, 'viewOrderPlaced']);

    //CHANGE STATUS 
    Route::post('status/{order_id}', [OrdersController::class, 'changeStatus']);
    Route::post('approve-all', [OrdersController::class, 'approveAll']);

});

require __DIR__.'/auth.php';

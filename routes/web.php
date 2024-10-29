<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomRegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.adminhome');
    })->name('dashboard');
});


// Categories
Route::get('add_category',[CategoryController::class,'index'])->name('category');
Route::get('categories',[CategoryController::class,'showCategories'])->name('categories');
Route::post('store-form',[CategoryController::class,'addCategories'])->name('create');

Route::get('/editcategory/{id}',[CategoryController::class,'edit_category'])->name('editcategory');  // Edit Category
Route::post('/updatecategory/{id}',[CategoryController::class,'update_category']);  // Update with New Category
Route::get('/deleteCategory/{id}',[CategoryController::class,'delete_category']);  // Delete Category


// Sub Categories
Route::get('add_subcategory',[SubcategoryController::class,'index'])->name('subcategory');
Route::get('subcategories',[SubcategoryController::class,'showCategories'])->name('subcategories');
Route::post('create-subcategory',[SubcategoryController::class,'addSubCategories'])->name('createsubcat');

Route::get('/editSubCategories/{id}',[SubcategoryController::class,'edit_subcategory']);  // Edit Sub Category
Route::post('/updateSubCategory/{id}',[SubcategoryController::class,'update_category']);  // Update with New Category
Route::get('/deleteSubCategories/{id}',[SubcategoryController::class,'delete_subcategory']);  // Delete Sub Category


//Products
Route::get('/view_product',[ProductController::class,'view_product']);
Route::post('/add_product',[ProductController::class,'add_product']);
Route::get('/product',[ProductController::class,'show_product']);

Route::get('/editProduct/{id}',[ProductController::class,'edit_product']);  // Edit Product
Route::post('/updateProduct/{id}',[ProductController::class,'update_product']);  // Update with New Product
Route::get('/deleteProduct/{id}',[ProductController::class,'delete_product']);  // Delete Product


// Customers Admin Section
Route::get('/customers',[CustomerController::class,'show_customer']);
Route::get('/editCustomer/{id}',[CustomerController::class,'edit_customer']);  // Edit Product
Route::post('/updateCustomer/{id}',[CustomerController::class,'update_customer']);  // Update with New Customer
Route::get('/deleteCustomer/{id}',[CustomerController::class,'delete_customer']);  // Delete Customer

// Customer Login and Registration UI section
Route::get('/', [HomeController::class,'index'])->name('home.index')->middleware('guest');
// Route::get('/login', [HomeController::class,'home'])->name('home.home')->middleware('guest');

Route::get('customer/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
Route::post('customer/register', [CustomerAuthController::class, 'register']);
Route::get('customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::post('customer/login', [CustomerAuthController::class, 'login'])->name('login');
// Route::post('/customer/logout', function () {
//     Auth::guard('customer')->logout();
//     return redirect('/');
// })->name('customer.logout');
Route::get('customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

//Profile Page
Route::get('/profile',[ProfileController::class,'index'])->name('user.profile');
Route::get('/edit', [ProfileController::class, 'edit'])->name('customer.address.edit')->middleware('auth:customer');
Route::post('/updateDetails',[ProfileController::class,'update'])->name('customer.updateDetails');

Route::get('/api/countries', function () {
    $path = public_path('countries.json');
    return response()->json(json_decode(file_get_contents($path), true));
})->name('api.countries');


// Orders
Route::get('/orders',[OrderController::class,'show_orders']);  // Show Orders


// Contact UI
Route::get('/contactUs', [ContactController::class,'show_contact'])->name('contactform');
Route::get('/addcontact', [ContactController::class,'add_contact'])->name('addcontact');

// Contact Admin
Route::get('/contacts', [ContactController::class,'index'])->name('contact');
Route::get('/editContact/{id}',[ContactController::class,'edit_contact']);  // Edit Contact
Route::post('/updateContact/{id}',[ContactController::class,'update_response']);  // Update Response
Route::get('/deleteContact/{id}',[ContactController::class,'delete_contact']);  // Delete Contact
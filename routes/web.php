<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','MarketController@index');

Auth::routes();
Route::post('/user1-auth','MainController@User1Auth');
// Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
//register user as admin
Route::get('register-user','HomeController@registrationIndex');
Route::post('create-user-account','HomeController@createUserAccount');
Route::get('/register-customer','RegisterCustomerController@index');
Route::post('customer-register','RegisterCustomerController@register');
// main controller
Route::get('dashboard', 'MainController@dashboard');
Route::get('admin/assign-privilege-index', 'MainController@AssignPrivilegeIndex');
Route::get('admin/assign-privilege-form', 'MainController@AssignPrivilegeForm');
Route::post('admin/assign-privilege', 'MainController@AssignPrivilege');
Route::post('admin/get-user-roles', 'MainController@getUserRoles')->name('get.user.roles');
Route::get('admin/user-accounts-index', 'MainController@UserAccountsIndex');
Route::post('admin/register-user', 'MainController@RegisterUser');
Route::get('backup-index','MainController@Backupindex');
Route::get('backup','MainController@Backup');


//Reset User Password Route Start
Route::get('admin/reset-password', 'MainController@resetPasswordIndex');
Route::post('reset-password', 'MainController@resetPassword');

//Change User Password
Route::get('change-password-index', 'MainController@changePasswordIndex');
Route::post('change-password', 'MainController@changePassword');

//********************************************Inventory Controller Start *******************************//
Route::get('inventory/dashboard', 'InventoryController@Dashboard');
Route::get('Add-Customers', 'InventoryController@AddCustomers');
Route::post('save-customer-details', 'InventoryController@SaveCustomerDetails');
Route::get('customers', 'InventoryController@CustomersIndex');
Route::patch('update-customers-details', 'InventoryController@updateCustomersDetails');
Route::get('delete-customer', 'InventoryController@DeleteCustomer')->name('customer.delete');
Route::get('add-category', 'InventoryController@AddCategory');
Route::post('save-category-details', 'InventoryController@SaveCategoryDetails');
Route::get('categories', 'InventoryController@CategoryIndex');
Route::get('delete-category', 'InventoryController@DeleteCategory')->name('category.delete');
Route::patch('update-category-details', 'InventoryController@UpdateCategoryDetails');
Route::get('add-product', 'InventoryController@AddProduct');
Route::post('save-product-details', 'InventoryController@SaveProduct');
Route::get('products', 'InventoryController@ProductIndex');
Route::get('delete-product', 'InventoryController@DeleteProduct')->name('product.delete');
Route::patch('update-product-details', 'InventoryController@UpdateProduct');
Route::get('purchase-orders', 'InventoryController@AddPurchaseOrder');
Route::post('get-product-price', 'InventoryController@GetProductPrice');
Route::get('store-ordertemp-data','InventoryController@migratetemOders');
Route::post('save-order', 'InventoryController@savePurchaseOrderDetails');
Route::post('save-order-temp','InventoryController@savePurchaseOrderDetailsTemp');
Route::get('orders', 'InventoryController@allPurchaseOrders');
Route::patch('update-order-details', 'InventoryController@updateOrderDetails');
Route::post('get-product-price-for-update', 'InventoryController@getProductIdToUpdate');
Route::get('stock-is-running-out', 'InventoryController@getRunningOutProducts');
Route::patch('change-stock-limit', 'InventoryController@updateStockLimit');
Route::post('/admin/product-save-image','InventoryController@SaveProductImage');
Route::get('/product/images/show/{id}','InventoryController@ShowProductImages')->name('product.show.image');
Route::get('/transaction-history','InventoryController@TransactionHistory');
//********************************************Inventory Controller ending *******************************//


// market controller start

 Route::get('market-place-index','MarketController@index');
 Route::get('search/{id}','MarketController@searchResult')->name('search');
 Route::post('search-anything','MarketController@SearchAnything');
 Route::get('show-item-details/{id}','MarketController@showProductDetails')->name('item.show');
 Route::get('stock-status','InventoryController@StockState');
 Route::get('add-item-to-cart/{id}','MarketController@addToCart')->name('add.item.to.cart');
 Route::get('check-out','MarketController@checkout');
 Route::get('confirm-check-out','MarketController@processCheckout');
 Route::get('drop-item/{id}','MarketController@dropItem')->name('item.drop');
//market controller end

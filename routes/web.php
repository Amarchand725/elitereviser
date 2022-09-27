<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;

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

Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    $cache = 'Route cache cleared <br /> View cache cleared <br /> Cache cleared <br /> Config cleared <br /> Config cache cleared';
    return $cache;
});

Route::get('/','Webcontroller@index' )->name('index');
Route::get('services','Webcontroller@services' )->name('services');
Route::get('academic','Webcontroller@academic_service' )->name('academic');
Route::get('terms','Webcontroller@terms' )->name('terms');
Route::get('privacy','Webcontroller@privacy' )->name('privacy');
Route::get('business-corporate','Webcontroller@business_corporate' )->name('business_corporate');
Route::get('non-english-speaker','Webcontroller@non_english_speaker' )->name('non_english_speaker');
Route::get('professional','Webcontroller@professional' )->name('professional');
Route::get('student','Webcontroller@student' )->name('student');
Route::get('writer','Webcontroller@writer' )->name('writer');
Route::get('cv','Webcontroller@cv' )->name('cv');
Route::get('contact-us','Webcontroller@contact_us' )->name('contact_us');
Route::get('my-orders','Webcontroller@my_orders' )->name('my_orders');
Route::get('user/order_details','Webcontroller@orderDetails' )->name('user.order_details');
Route::get('order','Webcontroller@order' )->name('order');
Route::get('checkout','Webcontroller@checkout' )->name('checkout');
Route::get('about-us','Webcontroller@aboutUs' )->name('about-us');
Route::get('career','Webcontroller@career')->name('career');

//apply coupon
Route::get('shop/apply-coupon', 'Webcontroller@AppliedCoupon')->name('shop.apply-coupon');
Route::get('shop/remove-coupon', 'Webcontroller@removeCoupon');
Route::get('payment_by', 'Webcontroller@paymentBy')->name('payment_by');

Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

Route::get('place_order/{id}', 'Webcontroller@placeOrder')->name('place_order');

Route::post('file-upload', 'Webcontroller@fileUploadPost')->name('file.upload.submit');
Route::post('file-upload-remove', 'Webcontroller@removefileUploadPost')->name('file.upload.submitremove');
Route::get('file/remove-file', 'Webcontroller@fileRemove')->name('file.remove-file');

Route::post('upload-instruction-file', 'Webcontroller@uploadInstructionFile')->name('upload-instruction-file');
Route::get('remove-instruction-file', 'Webcontroller@removeInstructionFile')->name('remove-instruction-file');

//customer confirm order
Route::post('customer/confirm-order', 'Webcontroller@confirmOrder')->name('customer.confirm-order');
Route::get('customer/confirm_order', 'Webcontroller@confirmSessionOrder')->name('customer.confirm_order');
Route::get('customer/payment/{id}', 'PaymentController@store')->name('customer.payment');

//counting no of words of uploaded file
Route::post('countWords', 'Webcontroller@countWords');

Route::post('save_request','ContactUsController@store' )->name('save_request');
Route::post('subscribe','SubscribeController@store' )->name('subscribe');

/* Route::middleware(['WebsiteRoutes'])->group(function () {
//
}); */

//admin login
Route::get('admin/login', 'AdminController@login');
Route::post('set-login','AdminController@setLogin')->name('set-login');

//editor login
Route::get('editor/login', 'AdminController@login');
// Route::post('set-login','AdminController@setLogin')->name('set-login');

Route::group(["middleware" => "role:editor"], function() {
    Route::get('editor/dashboard', 'AdminController@dashboard')->name('editor.dashboard');
    //editor controller
    Route::get('editor/new-jobs', 'EditorController@newJobs')->name('editor.new-jobs');
    Route::get('editor/your-jobs', 'EditorController@yourJobs')->name('editor.your-jobs');
    Route::get('editor/job-details', 'EditorController@jobDetails')->name('editor.job-details');
    Route::get('editor/show-job/{id}', 'EditorController@showJob')->name('editor.show-job');

    Route::post('editor/new-jobs/search', 'EditorController@search')->name('editor.new-jobs.search');

    //Accepted Job
    Route::post('editor/accept-job/store', 'AcceptedJobController@store')->name('editor.accept-job.store');
    Route::post('editor/accept-job/status', 'AcceptedJobController@status')->name('editor.accept-job.status');

    //chat
    Route::get('editor/chat/{id}', 'EditorChatController@editorChatRoom')->name('editor.chat');
    Route::post('editor/chat/store', 'EditorChatController@store')->name('editor.chat.store');
    Route::get('editor/get/chat', 'EditorChatController@show')->name('editor.get.chat');
});

Route::group(["middleware" => "role:admin"], function() {
    Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard');

    //Service
    Route::get('admin/services', 'ServiceController@index')->name('admin.services');
    Route::get('/admin/service/create', 'ServiceController@create')->name('service.create');
    Route::post('admin/service/store', 'ServiceController@store')->name('service.store');
    Route::get('admin/service/edit/{id}', 'ServiceController@edit')->name('service.edit');
    Route::post('admin/service/update/{id}', 'ServiceController@update')->name('service.update');
    Route::post('admin/service/delete/{id}', 'ServiceController@destroy');
    Route::post('admin/service/status', 'ServiceController@status')->name('service.status');
    Route::get('admin/service/search', 'ServiceController@search')->name('service.search');

    //Admin Contact us
    Route::get('admin/inbox', 'AdminController@allContactUs');
    Route::post('admin/status/contact-us', 'AdminController@statusContactUs');
    Route::get('admin/all_contact_us', 'AdminController@allSearchedContactUs');

    //Coupon
    Route::get('/admin/coupons', 'CouponController@index');
    Route::get('/admin/coupon/create', 'CouponController@create');
    Route::post('admin/coupon/store', 'CouponController@store');
    Route::get('admin/coupon/edit/{id}', 'CouponController@edit');
    Route::post('admin/coupon/update', 'CouponController@update');
    Route::post('admin/coupon/delete/{id}', 'CouponController@destroy');
    Route::post('/admin/coupon/status', 'CouponController@couponStatus');

    //Orders
    Route::get('/admin/orders', 'OrderController@index')->name('admin.orders');
    Route::get('/admin/order/show/{id}', 'OrderController@show');
    Route::post('/admin/order/search', 'Webcontroller@search');

    Route::get('admin/job-details', 'EditorController@jobDetails')->name('admin.job-details');

    // Route::post('admin/chat/store', 'ChatController@adminChatStore')->name('admin.chat.store');


    //admin chat
    Route::get('/admin/chat/{id}', 'ChatController@chatRoom')->name('admin.chat');
    Route::post('/admin/chat/store', 'ChatController@storeChat');
    //Admin Chat with customer
    Route::get('/admin/get/chat', 'ChatController@getChat')->name('admin.get.chat');

    //Admin Chat with editor
    Route::get('/admin/chat/editor/{id}', 'ChatController@chatWithEditor')->name('admin.chat.editor');
    Route::get('/admin/get/editor/chat', 'ChatController@getEditorChat')->name('admin.get.editor.chat');
    Route::post('/admin/editor/chat/store', 'ChatController@adminEditorChatStore')->name('admin.editor.chat.store');

    Route::get('admin/set-job-limit', 'AdminController@setJobLimit');
    Route::post('admin/job_limit/update/{id}', 'admincontroller@setjoblimitupdate')->name('admin.job_limit.update');
    Route::post('admin/job_limit/store', 'admincontroller@setjoblimitstore')->name('admin.job_limit.store');

});

Route::group(["middleware" => "role:user"], function() {
    Route::get('customer/chat/{order_number}', 'CustomerChatController@chatRoom')->name('customer.chat');
    Route::post('customer/chat/store', 'CustomerChatController@store')->name('customer.chat.store');
    Route::get('customer/get/chat', 'CustomerChatController@show')->name('customer.get.chat');
});

/*
|--------------------------------------------------------------------------
|Artist panel
|--------------------------------------------------------------------------
|
*/

// Route::group(['middleware' => 'auth'], function () {
    Route::get('/artist/albums', 'ArtistController@index');
    Route::post('/artist/search/{id}', 'ArtistController@allAlbums'); //ajax request for searching
    Route::get('/artist/create', 'ArtistController@create');
    Route::post('/artist/store', 'ArtistController@store');
    Route::get('/artist/edit/{id}', 'ArtistController@edit');
    Route::get('/artist/show/{id}', 'ArtistController@show');
    Route::post('/artist/update', 'ArtistController@update');
    Route::post('/artist/delete/{id}', 'ArtistController@delete');

    Route::get('/artist/event-calender', 'EventController@index');
    Route::get('/artist/event/create', 'EventController@create');
    Route::post('/artist/event/store', 'EventController@store');
    Route::post('artist/event/delete/{id}', 'EventController@delete');
    Route::get('/artist/event/edit/{id}', 'EventController@edit');
    Route::post('artist/event/update', 'EventController@update');

    //Gallery
    Route::get('/artist/gallery', 'GalleryController@index');
    Route::get('/artist/gallery/create', 'GalleryController@create');
    Route::get('/artist/gallery/edit/{id}', 'GalleryController@edit');

    //orders
    Route::get('/artist/orders', 'Webcontroller@artistOrders');
    Route::get('/artist/order/show/{id}', 'Webcontroller@orderDetails');
    Route::post('/artist/order/search', 'Webcontroller@getAllArtistOrders');

    //Bank details
    Route::get('/artist/bank-details', 'BankController@index');
    Route::get('/artist/bank/create', 'BankController@create');
    Route::post('/artist/bank/store', 'BankController@store');

    /*
    |--------------------------------------------------------------------------
    |Admin panel Web Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::post('/admin/contact-us/delete/{id}', 'AdminController@deleteContactUs');
    Route::post('/admin/contact-us/search', 'AdminController@getAllContactUs');
    Route::get('/admin/albums', 'AdminController@albums');
    Route::post('/admin/approve', 'AdminController@approve');
    Route::post('/admin/status', 'AdminController@status');
    Route::get('admin/editors', 'AdminController@allEditors');
    Route::get('admin/customers', 'AdminController@allCustomers');

    Route::post('admin/approve/editor', 'AdminController@approveEditor');
    Route::post('admin/status/editor', 'AdminController@statusEditor');
    Route::post('admin/status/customer', 'AdminController@statusCustomer');
    //admin ajax searching
    Route::post('/admin/all_albums', 'AdminController@allAlbums');
    Route::get('/admin/all_editors', 'AdminController@allSearchedEditor');
    Route::get('admin/all_customers', 'AdminController@allSearchedCustomer');
    Route::post('/artist/events/search', 'EventController@allSearchedEvent');
    Route::get('/admin/coupon/search', 'CouponController@allCoupons');

    //Subscribers
    Route::get('admin/subscribers', 'AdminController@allSubscribers');
    Route::post('admin/status/subscriber', 'AdminController@statusSubscriber');
    Route::get('/admin/all_subscribers', 'AdminController@allSearchedSubscriber');

    //Update Profile
    Route::post('/user/profile/update', 'AdminController@updateProfile');
    Route::post('/user/become-artist', 'AdminController@becameArtist');

    //update password
    Route::post('/user/password/update', 'AdminController@updatePassword');

    //Admin/Artist social links
    Route::post('/user/social/update', 'AdminController@socialUpdate');

    //Get All abodoned
    Route::get('/admin/abodoned', 'AdminController@abodoned');
    Route::post('/admin/abodoned/get-all-abodoned', 'AdminController@getAllAbodoned');

    //Complaines
    Route::post('/user/complain/store', 'ComplaineController@store');

    //partners
    Route::get('/admin/partner', 'PartnerController@index');
    Route::get('/admin/partner/create', 'PartnerController@create');
    Route::post('admin/partner/store', 'PartnerController@store');
    Route::get('admin/partner/edit/{id}', 'PartnerController@edit');
    Route::post('admin/partner/update', 'PartnerController@update');
    Route::post('admin/partner/delete/{id}', 'PartnerController@destroy');
    Route::post('/admin/partner/status', 'PartnerController@status');
    Route::post('/admin/partner/get_all_partners', 'PartnerController@getAllpartner');

    //Demos
    Route::get('/admin/demo', 'DemoController@index');
    // Route::post('admin/demo/delete/{id}', 'partnerController@destroy');
    Route::post('admin/demo/store', 'DemoController@store');
    Route::post('/admin/demo/status', 'DemoController@status');
    Route::post('/admin/demo/get_all_demos', 'DemoController@getAllDemos');



    //Complains
    Route::get('/admin/complaints', 'AdminController@complaints');
    Route::post('/admin/complaine/status', 'AdminController@complaineStatus');
    Route::post('/admin/complaine/search', 'AdminController@getAllComplaines');
    Route::post('/admin/complaine/delete/{id}', 'AdminController@deleteComplaine');


    //Admin Profile Setting
    Route::get('/profile/setting', 'AdminController@profileSetting');


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

require __DIR__.'/auth.php';

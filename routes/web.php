<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'PagesController@home')->name('page.home');
Route::get('/admin', 'PagesController@admin_login')->name('admin.login');
Route::get('/index', 'PagesController@index')->name('page.index');
Route::get('/product/list', 'PagesController@product_list')->name('page.product.list');
Route::get('/product/{id}', 'PagesController@product')->name('page.product');

// should be under auth middleware
Route::get('/admin/product', 'Page1Controller@index')->name('admin.product');
Route::get('/admin/home', 'Page2Controller@index')->name('admin.home');
//-------
Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function(){
   
   Route::get('/home', 'HomeController@index')->name('home');

   Route::resource('/homestatistics', 'HomeStatisticController');

   Route::resource('/products', 'ProductController');
   Route::resource('/about_company', 'AboutCompanyController');
   Route::resource('/blog_category', 'BlogCategoryController');
   Route::resource('/blog_comments', 'BlogCommentController');
   Route::resource('/blogs', 'BlogController');
   Route::resource('/blog_quotes', 'BlogQuoteController');
   Route::resource('/blog_tags', 'BlogTagController');
   // Route::resource('/business_packages', 'BusinessPacageController');
   Route::resource('/company_head', 'CompanyHeadController');
   Route::resource('/company_sub_section', 'CompanySubSectionController');
   Route::resource('/home_awards', 'HomeAwardController');
   Route::resource('/home_clients', 'HomeClientController');
   Route::resource('/home_concerns', 'HomeConcernController');
   Route::resource('/home_concern_images', 'HomeConcernImageController');
   Route::resource('/home_major_clients', 'HomeMajorClientController');
   Route::resource('/home_members', 'HomeMemberController');
   Route::resource('/home_member_images', 'HomeMemberImageController');
   Route::resource('/home_news', 'HomeNewsController');
   Route::resource('/home_product_features', 'HomeProductFeatureController');
   Route::resource('/home_recognitions', 'HomeRecognitionController');
   Route::resource('/home_testimonials', 'HomeTestimonialController');
   Route::resource('/office_information', 'OfficeInformationController');
   Route::resource('/product_all_features', 'ProductAllFeatureController');
   Route::resource('/product_banners', 'ProductBannerController');
   Route::resource('/product_buy', 'ProductBuyController');
   Route::resource('/product_clients', 'ProductClientController');
   Route::resource('/product_client_images', 'ProductClientImageController');
   Route::resource('/product_descriptions', 'ProductDescriptionController');
   Route::resource('/product_description_points', 'ProductDescriptionPointController');
   Route::resource('/product_features', 'ProductFeatureController');
   Route::resource('/product_images', 'ProductImageController');
   Route::resource('/product_our_strength', 'ProductOurStrengthController');
   Route::resource('/product_pricing_plans', 'ProductPricingPlanController');
   Route::resource('/product_statistics', 'ProductStatisticController');
   Route::resource('/product_strength', 'ProductStrengthController');
   Route::resource('/product_testimonials', 'ProductTestimonialController');
   Route::resource('/product_packages', 'ProductPackageController');
   Route::get('product/product_package_point/{id}', 'ProductPackageController@add_point')->name('product_package.addPoint');
   Route::post('product/product_package_point/store/{id}', 'ProductPackageController@store_point')->name('product_package.store-point');
   Route::resource('/product_package_points', 'ProductPackagePointController');
   Route::resource('/service_features', 'ServiceFeatureController');
   // Route::resource('/standard_pacages', 'StandardPacageController');
   Route::resource('/tag_blogs', 'TagBlogController');

});

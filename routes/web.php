<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hospital', 'WelcomeController@hospitalPage')->name('hospital');


Route::get('categories', 'AdminController@showCategoryForm');
Route::post('create-category', 'AdminController@createCategory');
Route::get('deactive-category/{slug}', 'AdminController@DeactivateCategory');
Route::get('active-category/{slug}', 'AdminController@activateCategory');
Route::get('edit-category/{slug}', 'AdminController@editCategory');
Route::post('update-category', 'AdminController@updateCategory');

Route::get('view-add-country-page', 'AdminController@viewCountry');
Route::post('create-country', 'AdminController@createCountry');
Route::get('edit-country/{slug}', 'AdminController@editCountry');
Route::post('update-country', 'AdminController@updateCountry');

Route::get('view-add-department-page', 'AdminController@viewDepartment');
Route::post('create-department', 'AdminController@createDepartment');
Route::get('edit-department/{slug}', 'AdminController@editDepartment');
Route::post('update-department', 'AdminController@updateDepartment');

Route::get('view-add-treatment-page', 'AdminController@viewTreatment');
Route::post('create-treatment', 'AdminController@createTreatment');
Route::get('edit-treatment/{slug}', 'AdminController@editTreatment');
Route::post('update-treatment', 'AdminController@updateTreatment');

Route::get('view-add-city-page', 'AdminController@viewCity');
Route::post('create-city', 'AdminController@createCity');
Route::get('edit-city/{slug}', 'AdminController@editCity');
Route::post('update-city', 'AdminController@updateCity');
Route::post('cities-By-country', 'AdminController@cities');

Route::get('view-add-hospital-brand-page', 'AdminController@hospitalBrandPage');
Route::post('create-hospital-brand', 'AdminController@createHospitalBrand');
Route::get('edit-hospital-brand/{slug}', 'AdminController@editHospitalBrand');
Route::post('update-hospital-brand', 'AdminController@UpdateHospitalBrand');

Route::get('view-add-hospital-page', 'AdminController@showhHospitalForm');
Route::post('create-hospital', 'AdminController@createHospital');
Route::get('second-step/{slug}', 'AdminController@secondCreateHospital');
Route::post('create-hospital-second', 'AdminController@finalCreateHospital');
Route::get('edit-hospital/{slug}', 'AdminController@editHospital');
Route::get('edit-second-step/{slug}', 'AdminController@editSecondPage');
Route::post('update-hospital', 'AdminController@updateAndSecondStep');
Route::post('update-hospital-second', 'AdminController@Finalupdate');


Route::get('edit-image/{slug}', 'AdminController@ImagePage');
Route::post('store-image', 'AdminController@createImage');

Route::get('edit-facilities/{slug}', 'AdminController@EditFacilitiesForm');
Route::post('create-facilities', 'AdminController@createFacilities');

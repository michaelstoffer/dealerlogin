<?php

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

Route::get('/', 'DashboardController@index');

Auth::routes();

Route::get('/profile', 'ProfileController@index');

Route::get('/training-videos', function() { return redirect('/training-videos/flyer-chase'); });
Route::get('/training-videos/flyer-chase', 'TrainingVideoController@flyerChase');
Route::get('/training-videos/flyer-pursue', 'TrainingVideoController@flyerPursue');
Route::get('/training-videos/flyer-explore', 'TrainingVideoController@flyerExplore');
Route::get('/training-videos/luna-lite', 'TrainingVideoController@lunaLite');
Route::get('/training-videos/luna-rover', 'TrainingVideoController@lunaRover');
Route::get('/training-videos/luna', 'TrainingVideoController@luna');
Route::get('/training-videos/sol', 'TrainingVideoController@sol');

Route::get('/service', function() { return redirect('/service/warranty'); });
Route::get('/service/warranty', 'ServiceController@warranty');
Route::get('/service/service-bulletins', 'ServiceController@serviceBulletins');
Route::get('/service/install-guides', 'ServiceController@installGuides');
Route::get('/service/care-and-maintenance', 'ServiceController@careAndMaintenance');
Route::get('/service/warranty-contacts', 'ServiceController@warrantyContacts');
Route::get('/service/manuals-and-trouble-shooting', 'ServiceController@troubleShootingAndManuals');

Route::get('/marketing-materials', function() { return redirect('/marketing-materials/logos'); });
Route::get('/marketing-materials/logos', 'MarketingController@logos');
Route::get('/marketing-materials/brochures', 'MarketingController@brochures');
Route::get('/marketing-materials/flyer-chase', 'MarketingController@flyerChase');
Route::get('/marketing-materials/flyer-pursue', 'MarketingController@flyerPursue');
Route::get('/marketing-materials/flyer-explore', 'MarketingController@flyerExplore');
Route::get('/marketing-materials/luna-lite', 'MarketingController@lunaLite');
Route::get('/marketing-materials/luna-rover', 'MarketingController@lunaRover');
Route::get('/marketing-materials/luna', 'MarketingController@luna');
Route::get('/marketing-materials/sol', 'MarketingController@sol');

Route::get('/sales-tools', function() { return redirect('/sales-tools/flyer-chase'); });
Route::get('/sales-tools/flyer-chase', 'SalesController@flyerChase');
Route::get('/sales-tools/flyer-pursue', 'SalesController@flyerPursue');
Route::get('/sales-tools/flyer-explore', 'SalesController@flyerExplore');
Route::get('/sales-tools/luna-lite', 'SalesController@lunaLite');
Route::get('/sales-tools/luna-rover', 'SalesController@lunaRover');
Route::get('/sales-tools/luna', 'SalesController@luna');
Route::get('/sales-tools/sol', 'SalesController@sol');

Route::get('/dealers/updateall', 'DealerController@updateAll');

Route::post('/password/update', 'ProfileController@passwdUpdate');

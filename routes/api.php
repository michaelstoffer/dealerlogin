<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/training-videos/flyer-chase', 'TrainingVideoController@apiFlyerChase');
Route::middleware('auth:api')->get('/training-videos/flyer-pursue', 'TrainingVideoController@apiFlyerPursue');
Route::middleware('auth:api')->get('/training-videos/flyer-explore', 'TrainingVideoController@apiFlyerExplore');
Route::middleware('auth:api')->get('/training-videos/luna-lite', 'TrainingVideoController@apiLunaLite');
Route::middleware('auth:api')->get('/training-videos/luna-rover', 'TrainingVideoController@apiLunaRover');
Route::middleware('auth:api')->get('/training-videos/luna', 'TrainingVideoController@apiLuna');
Route::middleware('auth:api')->get('/training-videos/sol', 'TrainingVideoController@apiSol');

Route::middleware('auth:api')->get('/service/warranty', 'ServiceController@apiWarranty');
Route::middleware('auth:api')->get('/service/service-bulletins', 'ServiceController@apiServiceBulletins');
Route::middleware('auth:api')->get('/service/install-guides', 'ServiceController@apiInstallGuides');
Route::middleware('auth:api')->get('/service/care-and-maintenance', 'ServiceController@apiCareAndMaintenance');
Route::middleware('auth:api')->get('/service/warranty-contacts', 'ServiceController@apiWarrantyContacts');
Route::middleware('auth:api')->get('/service/manuals-and-trouble-shooting', 'ServiceController@apiTroubleShootingAndManuals');

Route::middleware('auth:api')->get('/marketing-materials/logos', 'MarketingController@apiLogos');
Route::middleware('auth:api')->get('/marketing-materials/brochures', 'MarketingController@apiBrochures');
Route::middleware('auth:api')->get('/marketing-materials/flyer-chase', 'MarketingController@apiFlyerChase');
Route::middleware('auth:api')->get('/marketing-materials/flyer-pursue', 'MarketingController@apiFlyerPursue');
Route::middleware('auth:api')->get('/marketing-materials/flyer-explore', 'MarketingController@apiFlyerExplore');
Route::middleware('auth:api')->get('/marketing-materials/luna-lite', 'MarketingController@apiLunaLite');
Route::middleware('auth:api')->get('/marketing-materials/luna-rover', 'MarketingController@apiLunaRover');
Route::middleware('auth:api')->get('/marketing-materials/luna', 'MarketingController@apiLuna');
Route::middleware('auth:api')->get('/marketing-materials/sol', 'MarketingController@apiSol');

Route::middleware('auth:api')->get('/sales-tools/flyer-chase', 'SalesController@apiFlyerChase');
Route::middleware('auth:api')->get('/sales-tools/flyer-pursue', 'SalesController@apiFlyerPursue');
Route::middleware('auth:api')->get('/sales-tools/flyer-explore', 'SalesController@apiFlyerExplore');
Route::middleware('auth:api')->get('/sales-tools/luna-lite', 'SalesController@apiLunaLite');
Route::middleware('auth:api')->get('/sales-tools/luna-rover', 'SalesController@apiLunaRover');
Route::middleware('auth:api')->get('/sales-tools/luna', 'SalesController@apiLuna');
Route::middleware('auth:api')->get('/sales-tools/sol', 'SalesController@apiSol');

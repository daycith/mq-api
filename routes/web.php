<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix'=> 'api/v1'], function () use($router) {
    $router->get('/products/availableproducts', 'ApiProductsController@getAvailableProducts'); 
    $router->get('/products/toship', 'ApiProductsController@getProductsToShip'); 
    $router->get('/products/leastsold', 'ApiProductsController@getLeastSold');
    $router->get('/orderproducts', 'ApiProductsController@getOrderProducts');
    $router->get('/calculate_inventory', 'ApiProductsController@getNewInventory');
    $router->get('/products/bestseller', 'ApiProductsController@getBestSeller');
    
});

<?php

require __DIR__ . '/config/bootstrap.php';

use Api\Auth\Auth;
use Api\Controller\Products as ProductsController;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\AppFactory;

$controller = new ProductsController();

// get products
$api->get('/api/products', function($request, $response, $next) use($controller){

    $products = $controller->getProducts();
    $result   = new JsonResponse($products, $response->getStatusCode());

    return $result;
});

// find product
$api->get('/api/products/item/{id}', function($request, $response, $next) use($controller){

    $id = $request->getAttribute('id');
    $products = $controller->getProducts($id);
    $result   = new JsonResponse($products, $response->getStatusCode());
    // $response->getBody()->write($products);

    return $result;
});

// insert product
$api->post('/api/products', function($request, $response, $next) use($controller){

    $paramters = $request->getQueryParams();
    $products = $controller->insertProduct($paramters);

    $msg  = 'Insert not completed.';
    $code = 400;
    if($products === true){
        $msg  = 'Inserting successful';
        $code = 200;
    }
    $response->getBody()->write($msg, $code);

    return $products;
});

// update product
$api->put('/api/products', function($request, $response, $next) use($controller){

    $paramters = $request->getQueryParams();
    $products  = $controller->updateProduct($paramters);
    
    $msg  = 'Updating not completed.';
    $code = 400;
    if($products === true){
        $msg  = 'Updating successful';
        $code = 200;
    }
    $response->getBody()->write($msg, $code);

    return $products;
});

// remove product
$api->delete('/api/products/item/{id}', function($request, $response, $next) use($controller){

    $id = $request->getAttribute('id');
    $products = $controller->removeProduct($id);

    $msg  = 'Delete not completed.';
    $code = 400;
    if($products === true){
        $msg  = 'Delete successful';
        $code = 200;
    }
    $response->getBody()->write($msg, $code);

    return $products;
});

$app = AppFactory::create();
$app->pipe(new Auth());
$app->pipe($api);
$app->run();

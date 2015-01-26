<?php

$userDataContainer = new stdClass();
$userDataContainer->id = (new \Controllers\Core\Auth())->validateToken();

$app->getDI()->set("user",$userDataContainer);



$app->get("/person",function() use ($app){
    $controller = new \Controllers\Core\Person();
    $app->response = $controller->get();
});

$app->post("/auth",function() use ($app){
    $app->response = (new \Controllers\Core\Auth())->createToken();
});

$app->post("/checkAuth",function() use ($app){
    print_r($app->getDI()->get("user")->id);
    //$app->response = ;
});

$app->put("/remind", function() use ($app){
    $response->setStatusCode("204","No Content");
    $response->setJson(array("message"=>"OK nigga"));
});

/**
 * Not found handler
 */

$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found");
});

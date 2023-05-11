<?php

$cms->router->before('GET|POST','/','Middlewares\AuthMiddlewares@isLogin');
$cms->router->before('GET|POST','/customer.*','Middlewares\AuthMiddlewares@isLogin');
$cms->router->before('GET|POST','/project.*','Middlewares\AuthMiddlewares@isLogin');

$cms->router->get('/', 'Controllers\Home@Index');

// Login page
$cms->router->get('/login', 'Controllers\Auth@Index');
// Login Post
$cms->router->post('/login', 'Controllers\Auth@Login');
$cms->router->get('/logout', 'Controllers\Auth@Logout');

// müşteriler


$cms->router->mount('/customer', function() use ($cms) {

    $cms->router->get('/', 'Controllers\Customer@Index');
    $cms->router->get('/add', 'Controllers\Customer@Add');
    $cms->router->get('/edit/([0-9]+)', 'Controllers\Customer@Edit');

});
$cms->router->mount('/project', function() use ($cms) {

    $cms->router->get('/', 'Controllers\Project@Index');
    $cms->router->get('/add', 'Controllers\Project@Add');
    $cms->router->get('/edit/([0-9]+)', 'Controllers\Project@Edit');

});
?>
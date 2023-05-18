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
    $cms->router->post('/add', 'Controllers\Customer@CreateCustomer');   
    $cms->router->get('/edit/([0-9]+)', 'Controllers\Customer@Edit');
    $cms->router->get('/detail/([0-9]+)', 'Controllers\Customer@Detail');


    $cms->router->post('/edit', 'Controllers\Customer@EditCustomer');
    $cms->router->post('/remove', 'Controllers\Customer@RemoveCustomer');

});
$cms->router->mount('/project', function() use ($cms) {

    $cms->router->get('/', 'Controllers\Project@Index');
    $cms->router->get('/add', 'Controllers\Project@Add');
    $cms->router->post('/add', 'Controllers\Project@CreateProject');
    $cms->router->get('/edit/([0-9]+)', 'Controllers\Project@Edit');

    $cms->router->post('/edit', 'Controllers\Project@EditProject');
    $cms->router->post('/remove', 'Controllers\Project@RemoveProject');


});

//flag-icon-css ,jquery-validation,moment,pace-progress,summernote
//github da public/plugins altına atılmadı dosya çok olduğu için
?>
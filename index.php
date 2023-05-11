<?php

require __DIR__.'/config.php';
require __DIR__.'/vendor/autoload.php';

$cms = new \Core\Starter();

/*$array = [
    'isim' => 'deneme',
    'data' => [
        'soyisim' => '<span>ASD</span>'
    ]
];

$arr = \Core\Request::filter($array);
print_r($arr);*/

require __DIR__.'/App/Routes/route.php';
?>
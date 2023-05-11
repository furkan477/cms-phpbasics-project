<?php
$cms->router->mount('/control', function() use ($cms) {
    $cms->router->get('/pages', 'Page@List');
});
?>
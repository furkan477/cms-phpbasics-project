<?php

namespace App\Controllers;

use Core\BaseController;
use Core\session;

class Home extends BaseController
{
    public function Index()
    {
        $user = [
            'isim' => 'deneme',
            'soyisim' => 'ASD',
            'yas' => 34
        ];

       // print_r(session::getallSession());

        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('home/index',compact('data'));

    }
}

?>
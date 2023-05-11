<?php

namespace App\Controllers;

use Core\BaseController;

class Customer extends BaseController
{
    public function Index()
    {
        $user = [
            'isim' => 'deneme',
            'soyisim' => 'ASD',
            'yas' => 34
        ];

        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('customer/index',compact('data'));

    }
    public function Add()
    {
        $user = [
            'isim' => 'deneme',
            'soyisim' => 'ASD',
            'yas' => 34
        ];

        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('customer/add',compact('data'));

    }
    public function Edit($id)
    {
        $user = [
            'isim' => 'deneme',
            'soyisim' => 'ASD',
            'yas' => 34
        ];

        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('customer/edit',compact('data'));

    }
}

?>
<?php

namespace App\Controllers;

use Core\BaseController;

class Project extends BaseController
{
    public function Index()
    {
        $user = [
            'isim' => 'deneme',
            'soyisim' => 'ASD',
            'yas' => 34
        ];

        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('project/index',compact('data'));

    }
    public function Add()
    {
        $user = [
            'isim' => 'deneme',
            'soyisim' => 'ASD',
            'yas' => 34
        ];

        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('project/add',compact('data'));

    }
    public function Edit($id)
    {
        $user = [
            'isim' => 'deneme',
            'soyisim' => 'ASD',
            'yas' => 34
        ];

        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('project/edit',compact('data'));

    }
}

?>
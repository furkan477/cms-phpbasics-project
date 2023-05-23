<?php

namespace App\Controllers;

use App\Model\ModelHome;
use App\Model\ModelProject;
use Core\BaseController;
use Core\session;

class Home extends BaseController
{
    public function Index()
    {
        $ModelHome = new ModelHome();
        $data['totals'] = $ModelHome->getTotals()['totals'];
        $data['projects'] = $ModelHome->getTotals()['projects'];

        $ModelProject = new ModelProject();
        $data['projects_table'] = $ModelProject->getByStatus('A');
        $data['projects_table_2'] = $ModelProject->getByStatus('P');

        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('home/index',compact('data'));

    }
}

?>
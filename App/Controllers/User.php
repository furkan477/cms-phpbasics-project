<?php 
namespace App\Controllers;

use Core\BaseController;
use Core\session;

class User extends BaseController
{
  /*  public function setSession(){
        session::setSession('isim','Deneme ASD');       
    }                                               ilk dersin örenği web.php de kide
    public function getSession(){
        echo session::getSession('isim');
    } */


    public function showProfile($id)
    {
        
        //$users = $this->db->connect->query("SELECT * FROM users WHERE users.id='$id' ")->fetch(\PDO::FETCH_ASSOC);
        $users = $this->db->query("SELECT * FROM users WHERE users.id='$id' ");

        print_r($users);
    }

    public function Test()
    {
        $this->view->load('test',['isim' => 'dneeme']);
    }
    public function getTest()
    {
        $get = $this->request->post();
        print_r($get);
    }
}

?> 
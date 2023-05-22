<?php

namespace App\Model;

use Core\session;
use Core\BaseModel;

class ModelAuth extends BaseModel
{
    public function user_login($data){

        extract($data);
    
        $password = md5($password);

        $user = $this->db->query("SELECT * FROM system_users 
            WHERE system_users.email = '$email' && system_users.password = '$password'

        ");
        if ($user){
            session::setSession('login',true);
            session::setSession('name',$user['name']);
            session::setSession('surname',$user['surname']);
            session::setSession('email',$user['email']);
            session::setSession('id',$user['id']);
            session::setSession('password',$user['password']);
            return true;
        }else{
            return false;
        }
    }
}

?>
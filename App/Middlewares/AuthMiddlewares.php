<?php 

namespace App\Middlewares;

use Core\BaseMiddlewares;
use Core\session;

class AuthMiddlewares extends BaseMiddlewares
{
    public function isLogin(){
        $login = session::getSession('login');

        if(!$login){
            session_destroy();
            redirect('login');
        }
    }
}

?>
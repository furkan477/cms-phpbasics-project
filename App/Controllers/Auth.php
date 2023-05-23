<?php

namespace App\Controllers;

use Core\BaseController;
use Core\session;

class Auth extends BaseController
{
    public function Index()
    {
        $data['form_link'] = _link('login');

        echo $this->view->load('auth/index',$data);
    }
    public function Login()
    {
        $data = $this->request->post();

        if(!$data['email']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Email adresinizi giriniz';
            echo json_encode(['status' => $status , 'title' => $title , 'msg' => $msg]);
            exit();
        }
        if(!$data['password']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Şifrenizi giriniz';
            echo json_encode(['status' => $status , 'title' => $title , 'msg' => $msg]);
            exit();
        }

        $AuthModel = new \App\Model\ModelAuth();
        $access = $AuthModel->user_login($data);
       
            if($access){
                $status = 'success';
                $title = 'İşlem Başarılı';
                $msg = 'İşlem başarı ile tamamlandı.';
                echo json_encode(['status' => $status , 'title' => $title , 'msg' => $msg , 'redirect' => _link()]);
                exit();
            }else{
                $status = 'error';
                $title = 'Ops! Dikkat';
                $msg = 'Beklenmedik bir hata meydana geldi. Lütfen sayfanızı yenileyerek tekrar deneyiniz.';
                echo json_encode(['status' => $status , 'title' => $title , 'msg' => $msg]);
                exit();
            }
    
    }
    public function Logout()
    {
        Session::removeSession();
        redirect('login');
    }
}
?>
<?php 
namespace App\Controllers;

use App\Model\ModelUser;
use Core\BaseController;
use Core\session;

class User extends BaseController
{
    public function Index()
    {

        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['user'] = Session::getAllSession();

        echo $this->view->load('user/index',compact('data'));


    }

    public function EditProfile()
    {
        $post = $this->request->post(); 

        if(!$post['name']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen Adınızı Boş Girmeyiniz';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if(!$post['surname']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen Adınızı ve Soyadınızı Boş Girmeyiniz';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if(!$post['email']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen E-posta Adresinizi Boş Girmeyiniz';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $Modeluser = new ModelUser();
        $update = $Modeluser->editProfile($post);

        if ($update){
            Session::setSession('name',$post['name']);
            Session::setSession('surname',$post['surname']);
            Session::setSession('email',$post['email']);
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Profiliniz Başarıyla Güncellenmiştir.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

    }

    public function ChangePassword()
    {
        $post = $this->request->post(); 

        if(!$post['password']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Eski Şifre Kısmını Boş Bırakamazsınız.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if(!$post['new_password']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Yeni Şifre Kısmını Boş Bırakamazsınız.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if(!$post['new_password_again']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Yeni Şifre Tekrarı Kısmını Boş Bırakamazsınız.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if($post['new_password'] != $post['new_password_again']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Girdiğiniz Yeni Şifreleriniz Uyuşmuyor';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $Modeluser = new ModelUser();
        $pupdate = $Modeluser->changePassword($post);

        if ($pupdate){
            Session::setSession('password', md5( $post['new_password']));
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Şifreniz Başarıyla Güncellenmiştir.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

    }

}

?> 
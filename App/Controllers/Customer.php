<?php

namespace App\Controllers;

use App\Model\ModelCustomer;
use App\Model\ModelProject;
use Core\BaseController;

class Customer extends BaseController
{
    public function Index()
    {
        $ModelCustomer = new ModelCustomer();

        $data['customers'] = $ModelCustomer->getCustomers();

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
        $ModelCustomer = new ModelCustomer();
        $data['customer'] = $ModelCustomer->getCustomer($id);
        
        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('customer/edit',compact('data'));

    }
    public function Detail($id)
    {
        $ModelProject = new ModelProject();

        $data['projects'] = $ModelProject->getProjectsByCustomerID($id);

        $ModelCustomer = new ModelCustomer();
        $data['customer'] = $ModelCustomer->getCustomer($id);
        
        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('customer/detail',compact('data'));

    }

    public function CreateCustomer(){

        $data = $this->request->post();

        if (!$data['customer_name'] || !$data['customer_surname']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen müşteri adını ve soyadını giriniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $ModelCustomer = new ModelCustomer();
        $insert = $ModelCustomer->createCustomer($data);

        if ($insert){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('customer')]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }

    public function RemoveCustomer(){

        $data = $this->request->post();

        if (!$data['customer_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Müşteri Bulunamadı !';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        
        $remove = $this->db->remove("DELETE FROM customers WHERE customers.id = '{$data['customer_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Kullanıcı başarıyla silindi';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'remove' => $data['customer_id']]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }

    public function EditCustomer(){

        $data = $this->request->post();

        if (!$data['customer_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen müşteri adını ve soyadını giriniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if (!$data['customer_name'] || !$data['customer_surname']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen müşteri adını ve soyadını giriniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $ModelCustomer = new ModelCustomer();
        $insert = $ModelCustomer->editCustomer($data);

        if ($insert){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('customer')]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }

    public function TakeNote($id){

        $data = $this->request->post();
        $data['id'] = $id;

        if (!$data['html']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen boş not göndermeyiniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        
        $ModelCustomer = new ModelCustomer();
        $insert = $ModelCustomer->editNote($data);

        if ($insert){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('customer')]);
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
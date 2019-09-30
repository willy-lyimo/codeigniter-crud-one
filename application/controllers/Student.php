<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{

    public function __construct(){
        parent :: __construct();

        $this->load->model('Student_m','stm');

    }

    public function index(){
        $this->load->view('layout/header');
        $this->load->view('student/index');
        $this->load->view('layout/footer');
    }

    public function showAllStudents(){
        $result = $this->stm->getAllStudents();
        echo json_encode($result);
    }

    public function addStudent(){
        $result =$this->stm->addStudent();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);

    }

    public function editStudent(){
        $result = $this->stm->editStudent();
        echo json_encode($result);
    }

    public function updateStudent(){
        $result = $this->stm->updateStudent();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function deleteStudent(){
        $result = $this->stm->deleteStudent();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
?>
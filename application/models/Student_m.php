<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_m extends CI_Model{

    public function getAllStudents(){
        $query = $this->db->get('student');

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function addStudent(){

        $field = array('full_name'=>$this->input->post('student_name'),
                        'school_name'=>$this->input->post('school_name'),
                         'age'=>$this->input->post('age'));
        $this->db->insert('student',$field); 

        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }                
    }

    public function editStudent(){
        $id = $this->input->get('student_id');
        $query=$this->db->where('id',$id)->get('student');
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function updateStudent(){
        $id = $this->input->post('id');
        $field = array('full_name'=>$this->input->post('student_name'),
        'school_name'=>$this->input->post('school_name'),
         'age'=>$this->input->post('age'));

         $this->db->where('id',$id)->update('student',$field);
         if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteStudent(){
        $id = $this->input->get('id');
        $this->db->where('id',$id)->delete('student');
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
}
?>
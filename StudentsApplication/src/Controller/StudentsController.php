<?php
namespace App\Controller;

class StudentsController extends AppController
 {
    public function index()
   {
      $students=$this->Students->retrieveStudentsList();
      
        $this->set(compact('students'));
    }   
       
   
}
?>

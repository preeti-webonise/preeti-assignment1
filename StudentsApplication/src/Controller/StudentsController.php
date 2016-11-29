<?php
namespace App\Controller;

class StudentsController extends AppController
 {
    public function index()
   {
        //$this->loadModel('Students');
        //$this->loadModel('Pincodes'); 
        //$student = $this->Students->newEntity();

       $students=$this->Students->retrieveStudentsList();
       //echo '<pre>',print_r($students);exit;

       //$this->set('students',$students);
        $this->set(compact('students'));
    }   
        //$Student = new StudentsController;
        /*$student_id=101 ;
        $studentList = $Student -> getStudentsList($student_id );
        $this->set('students',$studentList);
   }
   public function getStudentsList($student_id)
   {
       //$this->loadModel('Employees');
       $students=$this->Students->find('all', 
           'fields'=>['Students.*','Addresses.city'],
           'joins' => [
            
                        'table' => 'addresses',
                        'alias' => 'addresses',
                        'type' => 'INNER',
                        'conditions' => array
                        [
                            'Students.id = Addresses.student_id'
                        ]
                       ]
                  ])
           'conditions'=>array('Addresses.student_id'=>$student_id)));
       return $students;*/
   
}
?>
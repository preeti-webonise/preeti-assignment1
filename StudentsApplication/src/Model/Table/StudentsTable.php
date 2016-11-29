<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class StudentsTable extends Table
{

    /*public function initialize(array $config)
    {

	$this->table('students');
	$this->belongsTo('pincodes', [
            'className' => 'PincodesTable',
            'foreignKey' => 'id',
            'joinTable' => 'students',
            'through' => 'StudentsTable',
            
        ]);
		$this->hasOne('Pincodes', [
           'foreignKey' => 'id'
        ]);*/
	//}

	public function initialize(array $config)
    {$this->table('students');

        $this->hasOne('Addresses', [
            'className' => 'Addresses',
            //'conditions' => ['Addresses.primary' => '1'],
            'dependent' => true
        ]);
    }

	public function retrieveStudentsList()
	{
		$students = TableRegistry::get('Students');
		$studentsQuery = $students->find('all')
		->select(['Students.id', 'Students.name', 'Addresses.city'])
		->innerJoinWith('Addresses', function ($q) {
         return $q->where(['Students.id' => 101]);
             });
		//echo '<pre>',print_r($studentsQuery);exit;

    return $studentsQuery;
         //$this->set('students',$studentsQuery);
    }
}
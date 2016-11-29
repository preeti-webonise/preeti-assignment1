<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class AddressesTable extends Table
{

    /*public function initialize(array $config)
    {

    $this->table('pincodes');
	
	 /*$this->hasMany('students', [
            'className' => 'StudentsTable',
            'foreignKey' => 'pincode',
            ]);*/
		//$this->belongsTo('Students');
    //}*/

    public function initialize(array $config)
    {
        $this->hasMany('Students', [
            'foreignKey' => 'student_id',
            'dependent' => true,
        ]);
    }
   
}
?>
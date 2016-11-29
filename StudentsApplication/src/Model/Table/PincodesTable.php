<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class PincodesTable extends Table
{
        public function initialize(array $config)
    {
        $this->hasMany('Students', [
            'foreignKey' => 'pincode',
            'dependent' => true,
        ]);
    }
   
}
?>

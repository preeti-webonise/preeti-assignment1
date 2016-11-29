<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class AddressesTable extends Table
{
     public function initialize(array $config)
    {
        $this->table('addresses');
        $this->belongsTo('Students', [
            'dependent' => true,
        ]);
    }
   
}
?>

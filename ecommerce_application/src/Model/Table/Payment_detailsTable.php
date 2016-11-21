<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class Payment_detailsTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('payment_details');
    }

}
?>


<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class Order_detailsTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('order_details');
    }

}
?>


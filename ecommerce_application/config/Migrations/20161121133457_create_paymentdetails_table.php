<?php

use Phinx\Migration\AbstractMigration;

class CreatePaymentdetailsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    
	 public function up()
    {
	$payment_details = $this->table('payment_details', ['id' => false, 'primary_key' => ['payment_id']]);
        $payment_details->addColumn('user_email', 'string')
                        ->addColumn('payment_id', 'integer')
             	        ->addColumn('order_id', 'integer')
			->addForeignKey('order_id','orders','order_id')
			->addColumn('order_date', 'date')
			->addColumn('discount', 'integer')
			->addColumn('net_amount', 'integer')
			->addColumn('payment_mode', 'string')
			->addColumn('payment_status', 'string')
			->create();
    }

    public function down()
    {
	  $this->dropTable('payment_details');
    }
}

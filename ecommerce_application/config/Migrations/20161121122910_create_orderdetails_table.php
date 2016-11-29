<?php

use Phinx\Migration\AbstractMigration;

class CreateOrderdetailsTable extends AbstractMigration
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
	  $order_details = $this->table('order_details', ['id' => false]);
        
          $order_details->addColumn('order_id', 'integer')
                        ->addColumn('product_id','integer')
			->addColumn('quantity', 'integer')
			->addForeignKey('product_id','products','product_id')
                        ->create();

    }

    public function down()
    {
	 $this->dropTable('order_details');
    }
}

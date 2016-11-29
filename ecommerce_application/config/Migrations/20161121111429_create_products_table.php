<?php

use Phinx\Migration\AbstractMigration;

class CreateProductsTable extends AbstractMigration
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
   /* public function change()
    {

    }*/
	public function up()
        {
                $products=$this->table('products',['id' => false, 'primary_key' => ['product_id']]);
                $products->addColumn('product_id','integer')
                      ->addColumn('product_name','string')
                      ->addColumn('colour','string');
                $products->create();
        }

        public function down()
        {
                $this->dropTable('products');
        }


}

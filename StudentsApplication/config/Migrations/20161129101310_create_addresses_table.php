<?php

use Phinx\Migration\AbstractMigration;

class CreateAddressesTable extends AbstractMigration
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
        $addresses=$this->table('addresses',['id' => false, 'primary_key' => ['id']]);
        $addresses->addColumn('id','integer')
              ->addColumn('city','string')
              ->addColumn('student_id','integer')
              ->addForeignKey('student_id','students','id');
        $addresses->create();   
    }

    public function down()
    {
        $this->dropTable('addresses');
    }
}

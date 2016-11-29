<?php

use Phinx\Migration\AbstractMigration;

class CreateStudentsTable extends AbstractMigration
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
        $students=$this->table('students',['id' => false, 'primary_key' => ['id']]);
        $students->addColumn('id','integer')
              ->addColumn('name','string');
        $students->create();   
    }

    public function down()
    {
        $this->dropTable('students');
    }
}

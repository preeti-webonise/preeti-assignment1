<?php

use Phinx\Migration\AbstractMigration;

class CreateAddressesTable extends AbstractMigration
{
  
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

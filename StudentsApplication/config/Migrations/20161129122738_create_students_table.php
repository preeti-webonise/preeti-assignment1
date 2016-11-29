<?php

use Phinx\Migration\AbstractMigration;

class CreateStudentsTable extends AbstractMigration
{
    
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

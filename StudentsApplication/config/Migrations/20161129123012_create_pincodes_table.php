<?php

use Phinx\Migration\AbstractMigration;

class CreatePincodesTable extends AbstractMigration
{
    
   public function up()
    {
        $pincodes=$this->table('pincodes',['id' => false, 'primary_key' => ['id']]);
        $pincodes->addColumn('id','integer')
                 ->addColumn('area','string');
        $pincodes->create();   
    }

    public function down()
    {
        $this->dropTable('pincodes');
    }
}

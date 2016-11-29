<?php
namespace App\Controller;


class PincodesController extends AppController 
{
	public function index() 
	{
		 $pincodes=$this->Pincodes->find('all');
		 $this->set(compact('pincodes'));
	}	
}
?>

<?php
namespace App\Controller;

//use App\Controller\AppController;
class PincodesController extends AppController 
{
	public function index() 
	{
		 $pincodes=$this->Pincodes->find('all');
		 $this->set(compact('pincodes'));
	}	
}
?>
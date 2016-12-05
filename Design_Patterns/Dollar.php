<?php
	require_once 'Currency.php';
	class Dollar implements Currency{
		private $price;     
	    public function __construct($price) {
	        $this->price = $price;
	    }     
	    public function findPrice() {
	       $USPrice=round($this->price/(68.28),2);
	       return $USPrice;
		}
	}
?>

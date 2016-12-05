<?php
	require_once 'Currency.php';
	class Pound implements Currency{
		private $price;     
	    public function __construct($price) {
	        $this->price = $price;
	    }     
	    public function findPrice() {
	       $UKPrice=round($this->price/(86.18),2);
	       return $UKPrice;
		}
	}
?>

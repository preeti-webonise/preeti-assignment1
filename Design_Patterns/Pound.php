<?php
	require_once 'Currency.php';
	class Pound implements Currency {
		private $price;
		const poundMultiplier = 86.18;  
	    public function __construct($price) {
	        $this->price = $price;
	    }

	    public function findPrice() {
	       $UKPrice = round($this->price / (self::poundMultiplier) , 2);
	       return $UKPrice;
		}
	}
?>

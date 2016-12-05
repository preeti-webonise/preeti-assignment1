<?php
	require_once 'Currency.php';
	class Pound implements Currency {
		private $price;
		const poundMultiplier = 86.18;
		const decimalLimit = 2;  
	    
	    public function __construct($price) {
	        $this->price = $price;
	    }

	    public function findPrice() {
	       $UKPrice = round($this->price / (self::poundMultiplier) , self::decimalLimit);
	       return $UKPrice;
		}
	}
?>

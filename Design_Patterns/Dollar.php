<?php
	require_once 'Currency.php';
	class Dollar implements Currency {
		private $price;
		const dollarMultiplier = 68.28; 
		const decimalLimit = 2;  
      
	    public function __construct($price) {
	        $this->price = $price;
	    }
	         
	    public function findPrice() {
	       $USPrice =round($this->price / (self::dollarMultiplier) , self::decimalLimit);
	       return $USPrice;
		}
	}
?>

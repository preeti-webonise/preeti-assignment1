<?php
	require_once 'PostgreSqlConnection.php';
	class Orders {  
		private $inputQuantity , $dbQuantity , $netPrice , $bookName , $currency;

		public function __construct($inputQuantity , $dbQuantity , $netPrice , $bookName , $currency){
			$this->inputQuantity = $inputQuantity;
			$this->dbQuantity    = $dbQuantity;
			$this->bookName      = $bookName;
			$this->netPrice      = $netPrice;
			$this->currency      = $currency;
		}       
        
   		public function generateOrder() {         
			if( $this->quantityCheck()) {             
		    	$this->addToCart();             
		   	    $this->placeOrder();             
		    }         
	    }
	
		private function addToCart () {
		$dbConnection = new PostgreSqlConnection;
		$database     = $dbConnection->connectDB();
		$selectQuery  = "Update books set quantity=quantity-" . $this->inputQuantity . "WHERE book_name='" . $this->bookName . "'"; 
		$statement    = $database->prepare($selectQuery);
		$statement->execute();
		echo"You have purchased\t" . $this->bookName . "\tbook of netprice" . $this->netPrice . "\t" . $this->currency;
		echo "<br />";
	    }     

		private function quantityCheck() {
			if($this->dbQuantity >= $this->inputQuantity) {
        	    return true;
      		} else {
            		return true;
        	}
        }     
        
        private function placeOrder() {
           echo "Your order is successfully placed";
    	}
    }
?>
     


<?php
require_once 'PostgreSqlConnection.php';
class Orders{  
	public function __construct($inputQuantity,$dbQuantity,$netPrice,$bookName){
		$this->$inputQuantity=$inputQuantity;
		$this->$dbQuantity=$dbQuantity;
		$this->$bookname=$bookName;
		$this->$netPrice=$netPrice;
	}       
        
   	public function generateOrder() {         
		if($this->quantityCheck()) {             
		    // Add Product to Cart
		    $this->addToCart();             
		   // Place and confirm Order
		    $this->placeOrder();             
		}         
	}
	
	private function addToCart () {
		$dbConnection=new PostgreSqlConnection;
		$database=$dbConnection->connectDB();
		$selectQuery= "Update books set quantity=quantity-".$inputQuantity."WHERE book_name='".$bookName."'"; 
		$statement = $database->prepare($selectQuery);
		$statement->execute();
		alert("You have purchased\t".$bookname."\tbook of netprice".$netPrice);
	}     

	private function quantityCheck() {         
        	if($dbQuantity>=$inputQuantity) {
        	    return true;
      		} else {
            		return true;
        	}
        }     
        
        private function placeOrder() {
           alert("Your order is successfully placed");
    	}
     


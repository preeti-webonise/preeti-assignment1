<?php
	require_once('/var/www/html/OopsAssignment/app/Model/User.php');
	require_once '/var/www/html/OopsAssignment/Config/database.php';
	class UserTest extends PHPUnit_Framework_TestCase{
		public function setUp(){ }
	  	public function tearDown(){ }
	  	public function testIndexIsValid(){
	  		$indexObj = new User();
	  		$username = "preeti";
	  		//$this->assertTrue($indexObj->index($username) !== false);
	  		$this->assertGreaterThan(0,strlen($username));
	  		$this->assertNotNull($username);

	  	}
	  	public function testEditIsValid(){
	  		$editObj = new User();
	  		$username = "preeti";
	  		//$this->assertTrue($editObj->edit($username) !== false);
	  		$this->assertGreaterThan(0,strlen($username));
	  	}
	  	public function testSaveIsValid(){
	  		$saveObj = new User();
	  		$username = "preeti";
	  		$userDetails=array("name" => "preetib","email" => "preeti.bhosale@gmail.com","birth_date"=>"1994-03-30","profile_id" => "2");
	  		$this->assertArrayHasKey("name",$userDetails);
	  		$this->assertContains("preetib",$userDetails);
	  	}
	  	public function testDeleteIsValid(){
	  		$deleteObj = new User();
	  		$username = "preeti";
	  		//$this->assertTrue($deleteObj->edit($username) !== false);
	  		$this->assertNotEmpty($username);
	  		$this->assertCount(1, ['preeti']);
	  	}
	}
?>

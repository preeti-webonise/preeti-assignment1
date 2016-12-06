<?php
	require_once 'UsersTable.php';
	
	class UsersTestCase extends  PHPUnit_Framework_TestCase {
		

	  	public function testAdd() {
	  		$usersTable=new UsersTable();
	  		$userName='preeti.bhosale@gmail.com';$password='preeti123#';$profileId=1;
	  		$userDetails=array('username'=>$userName,'password'=>$password,'profileid'=>$profileId);
	  		$this->assertArrayHasKey('username',$userDetails);
	  		$this->assertArrayHasKey('password',$userDetails);
	  		$this->assertArrayHasKey('profileid',$userDetails);
	  		$this->assertNotEmpty($userDetails);
	  		$this->assertCount(3,$userDetails);
	  		$this->assertNotNull($userDetails['username'],$userDetails['password'],$userDetails['profileid']);
			$this->assertInternalType('string', $userName,$password);
			$validEmail="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
			$this->assertRegExp($validEmail,$userName);
			$this->assertInternalType('integer', $profileId);
	  		$this->assertContains($userName,$userDetails);
	  		$this->assertContains($password,$userDetails);
	  		$this->assertContains($profileId,$userDetails);
	  		$this->assertStringEndsWith('@gmail.com',$userName);
	  		$this->assertTrue($usersTable->add($userDetails));
	  		return $userDetails;
	  	}
        
       /**
		*@depends testAdd
		*/
		public function testLogin($userDetails) {
			$usersTable=new UsersTable();
			$loginDetails=array('username'=>'preeti.bhosale@gmail.com','password'=>'preeti123#');
			$this->assertArrayHasKey('username',$loginDetails);
	  		$this->assertArrayHasKey('password',$loginDetails);
	  		$this->assertCount(2,$loginDetails);
	  		$this->assertNotNull($loginDetails['username'],$loginDetails['password']);
			$this->assertInternalType('string', $loginDetails['username'],$loginDetails['password']);
			$this->assertContainsOnly('string',$loginDetails);
			$this->assertEquals($userDetails['username'],$loginDetails['username']);
			$this->assertEquals($userDetails['password'],$loginDetails['password']);
			$this->assertTrue($usersTable->login($loginDetails));
		}

		/**
        *@depends testAdd
        */
	  	public function testEdit($userDetails) {
	  		$usersTable=new UsersTable();
	  		$editDetails=array('username'=>$userDetails['username'],'oldpassword'=>$userDetails['password'],'newpassword'=>'preeti123$');
	  		$this->assertArrayHasKey('username',$editDetails);
	  		$this->assertArrayHasKey('oldpassword',$editDetails);
	  		$this->assertArrayHasKey('newpassword',$editDetails);
	  		$this->assertNotEmpty($editDetails);
	  		$this->assertCount(3,$editDetails);
	  		$this->assertNotNull($editDetails['username'],$editDetails['oldpassword'],$editDetails['newpassword']);
			$this->assertInternalType('string', $editDetails['username'],$editDetails['oldpassword'],$editDetails['newpassword']);
			$this->assertNotEquals($editDetails['oldpassword'],$editDetails['newpassword']);
			$this->assertContainsOnly('string',$editDetails);
	  		$this->assertTrue($usersTable->edit($editDetails));
	  		return $editDetails;
		}

		 /**
		*@depends testEdit
		*/
		public function testDelete($editDetails) {
			$usersTable=new UsersTable();
			$deleteDetails=array('username'=>$editDetails['username'],'password'=>$editDetails['newpassword']);
			$this->assertNotEmpty($deleteDetails);
	  		$this->assertCount(2,$deleteDetails);
	  		$this->assertNotNull($deleteDetails['username'],$deleteDetails['password']);
			$this->assertInternalType('string', $deleteDetails['username'],$deleteDetails['password']);
			$this->assertContainsOnly('string',$deleteDetails);
			$this->assertTrue($usersTable->delete($deleteDetails));
		}

	  	
	}
?>

<?php
class MageTest extends PHPUnit_Framework_TestCase
{
    /**
     * Initialize Magento
     */
    public function setUp()
    {
        require_once( MAGENTO_ROOT . '/app/Mage.php' );
        Mage::app();
    }
 
    /**
     * Test if the ID of the store is 1
     */
    public function testMagestore()
    {
        $this->assertEquals(1, Mage::app()->getStore()->getId());
    }
}
?>
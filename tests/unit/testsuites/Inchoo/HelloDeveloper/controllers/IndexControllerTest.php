<?php
 
class Inchoo_HelloDeveloper_IndexController_IndexControllerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        /* You'll have to load Magento app in any test classes in this method */
        $app = Mage::app('default');
        /* You will need a layout for block tests */
        $this->_layout = $app->getLayout();
        /* Let's create the block instance for further tests */
        $this->_controllers = new Inchoo_HelloDeveloper_IndexController_IndexControllerTest;
        /* We are required to set layouts before we can do anything with blocks */
    }
    
    /**
    * @dataProvider provider
    */
    public function testIndexAction($data)
    {
        $this->assertTrue($data);
    }

    public function provider()
    {
        return['test data' => [true] ];
    }
}
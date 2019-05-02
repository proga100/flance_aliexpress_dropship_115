<?php  
   if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Tests;

use AliexApi\Operations\GetProductDetail;
 
class GetProductDetailTest extends \PHPUnit_Framework_TestCase {

    public function testGetProductDetail()
    {
        $listproducts = new GetProductDetail();
    }
 
}
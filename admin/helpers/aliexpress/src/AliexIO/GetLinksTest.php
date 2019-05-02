<?php  


/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Tests;
   if ( ! defined( 'WPINC' ) ) {
	die;
}
use AliexApi\Operations\GetLinks;
 
class GetLinksTest extends \PHPUnit_Framework_TestCase {

    public function testGetLinks()
    {
        $listproducts = new GetLinks();
    }
 
}
<?php  
   if ( ! defined( 'WPINC' ) ) {
	die;
}
/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/
namespace AliexApi\Tests;
include_once('e:/open/OpenServer/domains/localhost/aliexpress/aliexapi-master/vendor/autoload.php');

use AliexApi\Configuration\GenericConfiguration;
use AliexApi\AliexIO;
use AliexApi\Operations\ListProducts;
 
class AliexIOTest   {

    public function aliconfig($conf)
    {
        $conf
            ->setApiKey('13657')
            ->setTrackingKey('devcarbonus')
            ->setDigitalSign('aliexpress');
            return $conf;

    }
 
    public function testAliexIO()
    {
        $conf = new GenericConfiguration();
        $this->aliconfig($conf);
		
	
        $aliexIO = new AliexIO($conf);

        $listproducts = new ListProducts();
        $listproducts->setFields('productId,productTitle,productUrl,imageUrl');
        $listproducts->setKeywords('card phone');
        $listproducts->setCategoryId('509');
        $listproducts->setHighQualityItems('true');
        $formattedResponse = $aliexIO->runOperation($listproducts);

    }
 
}

$Ali = new AliexIOTest;

$Ali->testAliexIO();


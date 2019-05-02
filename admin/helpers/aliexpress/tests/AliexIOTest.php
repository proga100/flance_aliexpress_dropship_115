<?php 

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Tests;
     if ( ! defined( 'WPINC' ) ) {
	die;
}
include_once(__DIR__.'/AliexIO/Configuration/GenericConfiguration.php');
use AliexApi\Configuration\GenericConfiguration;
use AliexApi\AliexIO;
use AliexApi\Operations\ListProducts;
 
class AliexIOTest   {

    public function aliconfig($conf)
    {
        $conf
            ->setApiKey('12345')
            ->setTrackingKey('trackkey')
            ->setDigitalSign('dummydigitalsign');
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


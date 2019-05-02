<?php

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Tests;
   if ( ! defined( 'WPINC' ) ) {
	die;
}
use AliexApi\Configuration\GenericConfiguration;
use AliexApi\Request\Rest\Request;
use AliexApi\Request\RequestFactory;

class RequestFactoryTest extends \PHPUnit_Framework_TestCase {

    public function testRequestFactory()
    {
        $configuration = new GenericConfiguration();
        $configuration->setApiKey('12345')
            ->setTrackingKey('trackkey')
            ->setDigitalSign('dummydigitalsign')
            ->setRequest(new Request());
        $request = RequestFactory::createRequest($configuration);
        $this->assertSame($configuration, \PHPUnit_Framework_Assert::readAttribute($request, 'configuration'));
   }
 
}
<?php  


/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Request;
   if ( ! defined( 'WPINC' ) ) {
	die;
}
use AliexApi\Configuration\ConfigurationInterface;
use AliexApi\Operations\OperationInterface;

interface RequestInterface
{
    /**
     * Sets the configurationobject
     *
     * @param ConfigurationInterface $configuration
     */
    public function setConfiguration(ConfigurationInterface $configuration);

    /**
     * Performs the request
     *
     * @param OperationInterface $operation
     *
     * @return mixed The response of the request
     */
    public function perform(OperationInterface $operation);
}

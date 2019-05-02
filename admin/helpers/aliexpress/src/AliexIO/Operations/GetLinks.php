<?php  



/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Operations;
   if ( ! defined( 'WPINC' ) ) {
	die;
}  
class GetLinks extends AbstractOperation
{
    public function getName()
    {
        return 'getPromotionLinks';
    }

    public function setFields($fields)
    {
        $this->parameter['fields'] = $fields;
        return $this;
    }
    public function setTrackingId($trackingId)
    {
        $this->parameter['trackingId'] = $trackingId;
        return $this;
    }

    public function setUrls($urls)
    {
        $this->parameter['urls'] = $urls;
        return $this;        
    }
}
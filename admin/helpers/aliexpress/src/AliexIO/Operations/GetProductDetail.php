<?php  

 

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace AliexApi\Operations;
   if ( ! defined( 'WPINC' ) ) {
	die;
}  
class GetProductDetail extends AbstractOperation
{
    public function getName()
    {
        return 'getPromotionProductDetail';
    }

    public function setFields($fields)
    {
        $this->parameter['fields'] = $fields;
        return $this;
    }
    public function setProductId($productId)
    {
        $this->parameter['productId'] = $productId;
        return $this;
    }

    public function setLocalCurrency($currency)
    {
        $this->parameter['localCurrency'] = $currency;
        return $this;
    }
    public function setLanguage($language)
    {
        $this->parameter['language'] = $language;
        return $this;
    }
}

<?php  
 

/*
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
	
	*/ 
  namespace CLC\AliexApi;
  if ( ! defined( 'WPINC' ) ) {
	die;
}

interface ResponseTransformerInterface
{
    public function transform($response);
}

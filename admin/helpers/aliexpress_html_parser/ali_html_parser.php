<?php


class aliexpress_parser {

						
				public	$attrib_labels = array( 
						  '200000124' => 'size', // shoes sizes
						  '200000898'=> 'size' , // shoes euorpa sizes
						   '14' => 'color',
						   '136' => 'color', 
						   '5' => 'size', // garments sizes 
						   '200000369' => 'size', // ring sizes
						   '200000783' => 'size' // main stone size
						   );
						   
				public $url; // aliexpress url
				public $cid; // aliexpress product id
						   
	
 
    				
			/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.1.4
	 * @param      string    $Flance_wamp       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( ) {

	 add_filter( 'ali_attribute_import', array( $this, 'attributes_import' ), 10, 2 );

	}				
		// import full description function
	
public function attributes_import($product_array){



	$product_url = $product_array[0];
	$cid = $product_array[1];
	include_once('desc_aliexpress_import.php');

$attributes_html = $html->find('ul.sku-attr-list');

$javascript_text = $html->find('script[type=text/javascript]');

foreach ($javascript_text as $text){

	if (preg_match('#\sskuProducts\s*=\s*(.*?);\s*$#ms', $text->nodes[0]->innertext, $matches)) { // get product calculation values

   $string= explode("];",$matches[1]);
  $string =   $string[0]."]";



$product_calc = json_decode($string,true);
	 
//	print_r($data);
}	
	
}
//print_r($product_calc);
$simple_attributes = $this->simple_attributes($html); /// get simples attributes

//echo $html;
//print_r ($desc);
	foreach ($attributes_html  as $as){
		
		$attrib =$as->attr; // attibutes 
		$html_child = $as->children;

		
		switch ($attrib['data-sku-prop-id']) {
                    case "14": // color

                    $color_array = 	$this->color_html($html_child);

                    $product_attributes[$attrib['data-sku-prop-id']]=$color_array;

                        break;


                    case "136": // color

                    $color_array = 	$this->color_html($html_child);
                    $product_attributes[$attrib['data-sku-prop-id']]=$color_array;

                        break;
                      case "200000124": // shoes sizes

                    $sizes_array = $this->color_html($html_child );
                    $product_attributes[$attrib['data-sku-prop-id']]=$sizes_array;
                        break;
                          case "200000898": // shoes sizes  euopa sizes
                    $sizes_array = $this->color_html($html_child );
                    $product_attributes[$attrib['data-sku-prop-id']]=$sizes_array;
                        break;
                    case "5": // garments sizes
                        $sizes_array = $this->color_html($html_child );
                        $product_attributes[$attrib['data-sku-prop-id']]=$sizes_array;
                        break;


                    case "200000369": // ring sizes
                  $sizes_array = $this->color_html($html_child );
                  $product_attributes[$attrib['data-sku-prop-id']]=$sizes_array;
                        break;
                    case "200000783": //// main stone size
                    $sizes_array = $this->color_html($html_child );
                    $product_attributes[$attrib['data-sku-prop-id']]=$sizes_array;
                        break;

	    }
		
	} // end foreach 
	
                    $full_product_attibutes['fulldescription'] = $desc ;
                    $full_product_attibutes['simple_attributes']=$simple_attributes;
	            	$full_product_attibutes['product_attributes']=$product_attributes;
        			$full_product_attibutes['product_calc']=$product_calc ;
		//print_r ($full_product_attibutes);
return $full_product_attibutes;

} //end function desc import	
	


public 	function color_html($col_html){// get color array
	
foreach ($col_html as $color_html){
	
	
foreach ($color_html->children as $cl){
	

if ($color_html->attr['class'] == 'item-sku-image' ){
	$attribute['title'] = $cl->attr['title'];
	$attribute['image'] = $cl->children[0]->attr['src'];
}else{
	

	$attribute['size'] = $cl->children[0]->nodes[0]->innertext;// get sizes innerhtml
	

	
	
}
$i++;	
$attributes[$cl->attr['data-sku-id']]= 	$attribute;
}
	
}

return $attributes;

}

public function simple_attributes($html){

$simple_html = $html->find('ul.product-property-list',0)->find('li');


foreach ($simple_html as $htm) {

	$attrib = array(
	'label' => $htm->children[0]->nodes[0]->innertext, // atributes labels
	'value' => $htm->children[1]->nodes[0]->innertext, // atributes labels
	);
$simple_attributes[]=$attrib;
}
return $simple_attributes;

}



}	



<?php 
/**
 *vide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://www.flance.info
 * @since     1.1.4
 *
 * @package    Flance_aliexpress_dropship
 * @subpackage Flance_aliexpress_dropship/public/partials
*/



?>

         	
				   

		   

<div id="wamp_form">
   
	
<?php 
	
	$params = array( 
        'id' => '0' , 
	'showname' => 'y' , 
	'showimage' => 'y' , 
	'attribute' => 'y',
	'showdesc' => 'y' ,
        'showsku' => 'n' ,
        'showpkg' => 'n' ,
	'showprice' => 'y' , 
	'showquantity' => 'y' , 
		'showlink' => 'y' ,
	'quantity' => '0' , 
	'instock' => 'y',
	'showaddtocart' => 'y' , 
        'displaylist' => 'v' , 
        'displayeach' => 'h' , 
	'width' => '100' , 
	'border' => '0' , 
	'styling' => '' , 
	'align' => ''
           ) ;
		   $params['showname']= get_option('showname');
		    $params['showimage']= get_option('showimage');
			 $params['attribute']= get_option('attribute');
			  $params['showdesc']= get_option('showdesc');
			   $params['showsku']= get_option('showsku');
			    $params['showpkg']= get_option('showpkg');
			  $params['showprice']= get_option('showprice');
			   $params['showlink']= get_option('showlink');
			    $params['instock'] = get_option('instock');
			   $params['showaddtocart']= get_option('showaddtocart');
				   $params['redirect']= get_option('redirect');
				      $params['reload']= get_option('reload');
					     $params['redirectlink']= get_option('redirectlink');
						 
	

			 
			   if (!empty($form_id [form_id])) {
				  $formclass = "flance_".$form_id [form_id];
				   
			   }else{
				  $formclass = "flance"; 
				   
			   }
				   
		

	   
				   


    $html .= '

    <div id="'.$formclass.'error" ></div>


    <form id="'.$formclass.'"  class="'.$formclass.' multijs-recalculate" name="addtocart" method="post" action="" >';

		 $html .= '<h4>'.'Add Product(s)...'.'</h4>';
		$html .= "<table class=\"jshproductsnap\" width=\"{$params['width']}\" border=\"{$params['border']}\"  " ;
		$html .= ! empty( $params['align'] ) ? "align=\"{$params['align']}\">" : ">" ;
		$html .= "\n" ;
                $html .= "<tr style=''>\n" ;
               if( 'y' == $params['showimage'] )  $html .= "<th style='text-align:center;'>Image</th>\n" ;
                if( 'y' == $params['showsku'] ) $html .= "<th style='text-align:center;'>SKU</th>\n" ;
               if( 'y' == $params['showname'] ) $html .= "<th style='text-align:center;'>Name</th>\n" ;
               if( 'y' == $params['attribute'] ) $html .= "<th style='text-align:center;'>Attibutes</th>\n" ;
                if( 'y' == $params['showdesc'] )  $html .= "<th class='desc'>Description</th>\n" ;
          	  if( 'y' == $params['instock'] ) $html .= "<th class='instock'>In Stock</th>\n" ;
                 if( 'y' == $params['showprice'] ) $html .= "<th class='price'>Price</th>\n" ;
			
                if( 'y' == $params['showaddtocart'] )  $html .= "<th class='qty'>Qty</th>\n" ;
                   $html .= "</tr>\n" ;
		// set up how the rows and columns are displayed
		if( 'v' == $params['displayeach'] ) {
			$row_sep_top = "<tr>\n" ;
			$row_sep_btm = "</tr>\n" ;
		} else {
			$row_sep_top = "" ;
			$row_sep_btm = "" ;
		}
		
		if( 'h' == $params['displaylist'] ) {
			$start = "<tr>\n" ;
			$end = "</tr>\n" ;
		} else {
			$start = "" ;
			$end = "" ;
		}
		
		if( 'h' == $params['displaylist'] && 'v' == $params['displayeach'] ) {
			$prod_top = "<td valign=\"top\"><table>\n" ;
			$prod_btm = "</table></td>\n" ;
		} else if( $params['displaylist'] == $params['displayeach'] ) {
			$prod_top = "" ;
			$prod_btm = "" ;
		} else {
			$prod_top = "<tr>\n" ;
			$prod_btm = "</tr>\n" ;
		}
	
		$i = 0 ;
		$html .= $start ;
		
		foreach ($products as $product) {
			 $sku = $product->get_sku();
		 $name =$product->post->post_title;
		 $id = $product->post->ID;
		 if (isset($id )){

	
		 $desc= substr($product->post->post_excerpt, 0, 80);
		 $url =$url = get_permalink( $id );
		
$product_price = wc_get_product( $id );



             
			$html .= $prod_top ;
                    
                

                        
                        if( 'y' == $params['showimage'] ) {
				$html .= $row_sep_top ;
				
                              
                              
                                  
				
			$html .= "<td class=\"image\" align=\"center\">" ;
              if ( has_post_thumbnail($id) ) {
			
	
			$image            = get_the_post_thumbnail($id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			) );
			
		
		
			
		}  

			if ($params['showlink'] == 'y')		{
				$html .= "<a href=\"".$url."\">
				
				".$image	;

				$html .= "</a></td>\n" ;
			}else{
			$html .= $image."</td>\n" 	;

				
				
				
			}                
                      
				$html .= $row_sep_btm ;
			}
                     
                        if( 'y' == $params['showsku'] ) {
				$html .= $row_sep_top ;
				$html .= "<td class=\"product_name\" align=\"center\">" . $sku . "</td>\n" ;
				$html .= $row_sep_btm ;
			}
			
			
			if( 'y' == $params['showname'] ) {
				

				$html .= $row_sep_top ;
					if ($params['showlink'] == 'y')		{
				$html .= "<td class=\"product_name\" align=\"center\"><a href=\"" .  $url  . "\">" .  $name . "</a></td>\n" ;
				
					}else{
				$html .= "<td class=\"product_name\" align=\"center\">" .  $name . "</td>\n" ;
						
						
					}
				$html .= $row_sep_btm ;
			}
                  
                       
                     
                        if( 'y' == $params['attribute'] ) {
                         //    $attrib = $this->get_attribute($id);
                       
                           if( $attrib) {
                      //   $attrib = $this->get_attribute($id);
                         
                         }else {
                       //      $attrib = 'No Product attibute';
                             }
							 
							 // Get product attributes
$attributes = $product->get_attributes();


$formatted_attributes = array();


echo "</pre>";
if ( ! $attributes ) {
   $attrib = "No attributes";
}else{
	
	$attrib = Null;
	foreach($attributes as $attr=>$attr_deets){

    $attribute_label = wc_attribute_label($attr);

    if ( isset( $attributes[ $attr ] ) || isset( $attributes[ 'pa_' . $attr ] ) ) {

        $attribute = isset( $attributes[ $attr ] ) ? $attributes[ $attr ] : $attributes[ 'pa_' . $attr ];

        if ( $attribute['is_taxonomy'] ) {

            $formatted_attributes[$attribute_label]['label'] = implode( ', ', wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) ) );
				$formatted_attributes[$attribute_label]['name'] = implode( ', ', wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) ) );
				$formatted_attributes[$attribute_label]['name'] =$attr_deets['name'];
        } else {

            $formatted_attributes[$attribute_label]['label'] = $attribute['value'];
			$formatted_attributes[$attribute_label]['name'] =$attr_deets['name'];
        }

    }
		
}
		
foreach ( $formatted_attributes as $attribute_label=>$attribute ) {
	
	

       $attrib.= "<b>".$attribute_label . "</b>: ";
        $product_attributes = array();
		// getting attributes as array
        $product_attributes = explode(',',$attribute['label']);
		
	

        $attributes_dropdown = '<select name='.$id.'=attribute='.$attribute['name'].'>';
		
        foreach ( $product_attributes as $key=>$pa ) {
			if( $key != 0){ 
			// remove empty first space
			$attributes_dropdown .= '<option value="' .substr(strtolower($pa),1). '">' . $pa . '</option>'; 
			}else{
				// first options 
				$attributes_dropdown .= '<option value="' .strtolower($pa). '">' . $pa . '</option>';
				
			}
        }

        $attributes_dropdown .= '</select>';

         $attrib .= $attributes_dropdown;
}

}
				
                                $html .= $row_sep_top ;
                           
				$html .= "<td class=\"attibute\" align=\"center\">" . $attrib  . "</td>\n" ;
                              
				$html .= $row_sep_btm ;
			}
                      
			
			if( 'y' == $params['showdesc'] ) {
				$html .= $row_sep_top ;
				$html .= "<td class=\"desc\">" . $desc. "</td>\n" ;
				$html .= $row_sep_btm ;
			}
				if( 'y' == $params['instock'] ) {
        	

			$html .= $row_sep_top ;
		if ($product->get_stock_quantity()) { $qty = $product->get_stock_quantity();
		}elseif($product->is_in_stock()) {
			$qty ="in Stock";
			
			
		}else{
			
		$qty ="Out of Stock";	
		}
		
			$html .= "<td class=\"stock\">".$qty."</td>\n" ; 
             
                              
				$html .= $row_sep_btm ;
			}
			
			
			
              
			if( 'y' == $params['showprice'] ) {
                              
         
         
			

			$html .= $row_sep_top ;
			
			$tax = $product_price->get_price_including_tax(1,$product->get_price())- $product_price->get_price();
			$html .= "<td class=\"price\">" .  $product_price->get_price_html() . "</td>\n" ;
                $html .= '<input type="hidden" value="'.$product_price->get_price_including_tax(1,$product->get_price()).'" name="pricequat" id="pricequa'.$formclass.'_'.$id.'">';
              $html .= '<input type="hidden" value="'.$tax.'" name="pricetax" id="pricetax'.$formclass.'_'.$id.'">';
                              
				$html .= $row_sep_btm ;
			}
			
			$idi[$i] = $id;
		
			if( 'y' == $params['showquantity'] ) { 
				if( @$params['quantity'] > -1 ) {
					$qty = $params['quantity'][0] ;
				} else {
					 $qty = $params['quantity'][0] ;
				}
				
				$html .= $row_sep_top ;
				$html .= "<td class=\"addtocart\" style='width:70px;'>" ;
				
                                $html .= '
	<div>
     <span class="quantity-box">
     <input type="text" value="'.$qty.'" name="quantity[]" id="quantity'.$formclass.'_'.$id.'" size="4" class="quantity-input js-recalculate">
                              
                              
                              </span>  
                               <span class="quantity-controls js-recalculate">
<input class="quantity-controls quantity-plus" id="quantity-plus'.$formclass.'_'.$id.'" type="button"  value="+">
<input class="quantity-controls quantity-minus" id="quantity-minus'.$formclass.'_'.$id.'" type="button" value="-">
</span>  </div>
                          <div class="clear"></div>      
                                
                                </td>';
				
                
			
                           
                                $html .= $row_sep_btm ;
			}
			$html .= $prod_btm ;
			$i ++ ;
		}
		}
		$html .= $end ;

             
                    $html .= "<tr style=''>\n" ;
               if( 'y' == $params['showimage'] )  $html .= "<th style='text-align:center;'></th>\n" ;
                if( 'y' == $params['showsku'] ) $html .= "<th style='text-align:center;'></th>\n" ;
               if( 'y' == $params['showname'] ) $html .= "<th style='text-align:center;'></th>\n" ;
           if( 'y' == $params['attribute'] ) $html .= "<th style='text-align:center;'></th>\n" ;
                if( 'y' == $params['showdesc'] )  $html .= "<th></th>\n" ;
                 	  if( 'y' == $params['instock'] ) $html .= "<th style='text-align:center;'></th>\n" ;   
                 if( 'y' == $params['showprice'] ) $html .= "<th colspan='2'><div> <div style='float:left;'> Tax: </div><div style='margin-left:5px;float:left;' id='prodtax".$formclass."'>0</div><div style='margin-left:5px;float:left;'>  ".$sym."</div></div> <div style='clear:both;' />\n" ;




		 if( 'y' == $params['showaddtocart'] ) {
                
                 $html .= '<input type="hidden" value="total" name="total" id="total">';
                    $html .= '<input type="hidden" value="totaltax'.$formclass.'" name="totaltax'.$formclass.'" id="totaltax'.$formclass.'">';          
                   $html .= "<div> <div style='float:left;'>Total Price:  </div><div style='margin-left:5px;float:left;' id='prodtotal".$formclass."'>0</div><div style='float:left;margin-left:5px;'>  ".$sym."</div></div> <div style='clear:both;' /></th>\n";}
                   $html .= "</tr>\n" ;
		$html .= '
                
                
                </table>
              
               
                <div id="'.$formclass.'error_1" ></div>';
				if( 'y' == $params['showaddtocart'] ) { 
                $html .=' <div style=text-align:center;" >
				 <input
				 id="wamp_add_items_button_'.$formclass.'"
				 type="button" title="Add Items to Order"  
				value="	Add Item (s) to Order"
				 class="addtocart_button'.$formclass.'  add_order_item wamp_add_order_item_'.$formclass.'">


				</div>'; }
				
				
 
 
       $html .='	</form>' ;
	include(  'html-calculas.php' );
		$html .='</div>';
		



 ?>

  
	
	
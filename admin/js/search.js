

jQuery( document ).ready(function() {
 jQuery( ".simple" ).click(function() {
	   
jQuery( ".advance" ).show();
jQuery( ".advance_search" ).slideUp();
jQuery( ".simple" ).hide();
});

jQuery( ".advance" ).click(function() {
	 
jQuery( ".advance" ).hide();	
	   
jQuery( ".simple" ).show();
jQuery( ".advance_search" ).slideDown();

         
 
});

jQuery( ".by_product" ).click(function() {
	 	 document.cookie = "inp_keyword=no";
jQuery( ".by_product" ).hide();	
 jQuery("input#product_id").removeAttr('disabled');  	   

 
jQuery( ".simle_search_id" ).slideDown();
//jQuery( ".simle_or" ).slideDown();
//jQuery( ".simle_search_url" ).slideDown();
jQuery( ".simple_search" ).slideDown();
jQuery( ".by_keyword" ).show();

jQuery( ".pr_search" ).slideUp();


         
 
});
jQuery( ".by_keyword" ).click(function() {
		 document.cookie = "inp_keyword=yes";
	 

	jQuery( ".by_product" ).show();
	 jQuery("input#product_id").attr('disabled','disabled');  
jQuery( ".simle_search_id" ).slideUp();
jQuery( ".simle_or" ).slideUp();
jQuery( ".simle_search_url" ).slideUp();
jQuery( ".simple_search" ).slideUp();
jQuery( ".by_keyword" ).hide();
jQuery( ".pr_search" ).slideDown();


         
 
});

if ( getCookie("inp_keyword")=="yes") {
	
		jQuery( ".by_product" ).show();
	 jQuery("input#product_id").attr('disabled','disabled');  
jQuery( ".simle_search_id" ).slideUp();
jQuery( ".simle_or" ).slideUp();
jQuery( ".simle_search_url" ).slideUp();
jQuery( ".simple_search" ).slideUp();
jQuery( ".by_keyword" ).hide();
jQuery( ".pr_search" ).slideDown();
	
}
if ( getCookie("inp_keyword")=="no") {
jQuery( ".by_product" ).hide();	
 jQuery("input#product_id").removeAttr('disabled');  	   

 
jQuery( ".simle_search_id" ).slideDown();
//jQuery( ".simle_or" ).slideDown();
//jQuery( ".simle_search_url" ).slideDown();
jQuery( ".simple_search" ).slideDown();
jQuery( ".by_keyword" ).show();

jQuery( ".pr_search" ).slideUp();	
	
	
}
});
 
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
} 

	
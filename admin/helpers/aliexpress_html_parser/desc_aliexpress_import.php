<?php
include_once('simple_html_dom.php');


$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>array("Accept-language: en-US,en;q=0.5" ,
              "Cookie: ali_apache_id=10.182.251.136.1495707675746.206519.6; xman_us_f=x_l=0&x_locale=en_US&x_as_i=%7B%22cv%22
%3A%222%22%2C%22tp1%22%3A%22ak1%22%2C%22src%22%3A%22link-c-tool%22%2C%22af%22%3A769085252%2C%22cpt%22
%3A1496667860463%2C%22channel%22%3A%22AFFILIATE%22%2C%22affiliateKey%22%3A%22rVzFeQf%22%2C%22tagtime
%22%3A1496667860466%2C%22vd%22%3A%2230%22%7D; aep_usuc_f=region=UZ&site=glo&b_locale=en_US&c_tp=RUB;
 intl_common_forever=jo6e/6Mb9hoSj8t5dAzb35OCvfxM7+JuKtmGFV7W8aekyMXLe0HghQ==; xman_f=rQtkv8dOcaba0lwR2yNYxiuyWYZWoLWbka7S7RrF3
+N9A3Tcke21yLXzBViEWdpus9KcXhR5wVev9t4uzyod6Lp46o1uDUM4Icyg890/meNNDyBB5xrJJA==; _ym_uid=1495707674745910615
; l=Avb2GZjsHMh8T78DG-rLYedLRif6AjpR; isg=Ap2dqh-ImAoWlnw2fwk1Og-zrXlXEtBveki-RV9iT_QjFrxIJwtH3eWAZjDv
; ali_beacon_id=10.182.251.136.1495707675746.206519.6; cna=Jp6tEV6B1CACAVvM7a2i38nA; _ga=GA1.2.835324416
.1495707684; acs_usuc_t=x_csrf=1e4e6pgwvo40i&acs_rt=d8bdc396d7e34613ba604ff146ee49e7; aeu_cid=09384e19ffc942e0abbdc3cb16a827ee-1496667860463-09459-rVzFeQf
; xman_t=glghYKVLGEYRlH2gqN/EQjb0ZJVPIeUwszywbWn2r1QtvNKnZZ2Ewad7MDygu3F3; intl_locale=en_US; JSESSIONID
=7826ADA709DF27E2BE92CEEADD12BE0B; _ym_isad=2; _gid=GA1.2.1024777071.1496667899; _uab_collina=149666806727754645689164
; _umdata=3FBF33F2D4D69FA113250F3E1B5D4C836B7E03DE1370A789BC5DEAE6FBB104BE3A882F849CB350C0CD43AD3E795C914CE2B2EC546749BC59E371D5DC28ED59FF
; _ym_visorc_29739640=b; _mle_tmp0=eNrz4A12DQ729PeL9%2FV3cfUx8KvOTLFSMrcwMnN0cTQ3sHRxMzJ3NXJytTRydnV1dHExBLINnJR0kkusDE0szcyNTSxNDS1MTXQSk9EEciusDGqjAK2aGDY
%3D; _gat=1 ;",
	"Host:www.aliexpress.com ",
	"Connection: keep-alive ",
	"Referer: http://www.google.com ",
	"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0",
	"Upgrade-Insecure-Requests: 1",
	"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8"
		))
);
$co = 'aep_usuc_f=site=glo&b_locale=en_US;';






$follow  = true;

$curl = curl_init();


// curl_setopt($curl, CURLOPT_HTTPHEADER, $opts['http']['header']);  temporary off
curl_setopt($curl, CURLOPT_URL, $product_url);

curl_setopt($curl, CURLOPT_FOLLOWLOCATION, $follow);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result= curl_exec($curl);
curl_close($curl);


$html = str_get_html($result);


// get description content
include_once('pharse-master/pharse.php');

$desc_html = Pharse::file_get_dom('https://desc.aliexpress.com/getDescModuleAjax.htm?productId='.$cid);

if (preg_match('#\swindow.productDescription\s*=\s*(.*?);\s*$#ms', $desc_html->getInnerText(), $matches)) {
	$str = str_replace("window.productDescription='","",$matches[0]);
	$str = rtrim($str);
	

	
	$desc = substr($str, 0, -2);
}




?>
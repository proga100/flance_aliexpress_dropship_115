<?php
include_once('../simple_html_dom.php');


echo "<html><meta charset='utf-8'>";
echo "<body>";
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en-US,en;q=0.5 \r\n" .
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
%3D; _gat=1 ;  \r\n".
	"Host:www.aliexpress.com \r\n".
	"Connection: keep-alive \r\n".
	"Referer: http://www.google.com \r\n".
	"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0 \r\n".
	"Upgrade-Insecure-Requests: 1 \r\n".
	"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8 \r\n".
	"Accept-Encoding: gzip, deflate, br \r\n"		  
	)
);
$co = 'aep_usuc_f=site=glo&b_locale=en_US;';
$link='https://www.aliexpress.com/item/TEAMYO-ID101-Smart-Bracelet-BT4-0-Heart-Rate-Monitor-Smartband-Pulse-Sports-Fitness-Activity-Tracker-Wristband/32713730664.html';

//$link="https://www.aliexpress.com/store/product/New-Arrival-Original-Launch-X431-EasyDiag-2-0-Plus-OBDII-Code-Reader-for-Android-IOS-Easy/2539007_32792508019.html?spm=a2g01.8764166.mcaabb8.4.bA3To9";
$link= 'https://www.aliexpress.com/item/Toyouth-2017-Spring-New-Arrival-Women-Cute-A-Line-Solid-Full-Sleeve-Draped-Knee-Length-O/32798681761.html?spm=2114.01010108.3.3.q3qQZB&ws_ab_test=searchweb0_0,searchweb201602_5_10152_10065_10151_10068_5010014_10136_10137_10060_10138_10155_10062_437_10154_10056_10055_10054_10059_303_100031_10099_10103_10102_10096_10169_10052_10053_10142_10107_10050_10051_5030015_10084_10083_10119_10080_10082_10081_10110_519_10111_10112_10113_10114_10182_10078_10079_10073_10123_10120_10189_142-519_10120,searchweb201603_1,ppcSwitch_3&btsid=743b6f70-2145-4473-886f-5b68a464081d&algo_expid=b8284a32-df15-4d92-985f-4b32552e78e4-0&algo_pvid=b8284a32-df15-4d92-985f-4b32552e78e4';
//$context = stream_context_create($opts);

//$html = file_get_html($link,false,$context);



//$ret = $html->find('div.product-desc',0);



//print_r ($ret->outertext);

//echo $html->outertext;



$url = $link;
$follow  = true;

$curl = curl_init();


//curl_setopt($curl, CURLOPT_COOKIE, $opts['http']['header']);
curl_setopt($curl, CURLOPT_HTTPHEADER, $opts['http']['header']);
curl_setopt($curl, CURLOPT_URL, $url);
//curl_setopt($curl, CURLOPT_POST, false);
//curl_setopt($curl, CURLOPT_HEADER, $follow);
//curl_setopt($curl, CURLOPT_REFERER, 'www.google.com');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, $follow);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($curl, CURLOPT_HEADER, false);
$result= curl_exec($curl);
curl_close($curl);
//echo $relult;

$html = str_get_html($result);
//echo "<pre>"
$ret = $html->find('div.product-desc',0);

print_r ($ret->outertext)
//$ret = $html->find('div.product-desc',0);



//print_r ($ret->outertext);
//echo utf8_decode($result);
	
		
//echo "</body>";
//echo "</html>";
?>
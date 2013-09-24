<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include_once('GoogleCustomSearch.class.php');
$apikey 	= 'AIzaSyCBB00XLGn12GeK39PrImye1q23x9vi0I0';
$seid 		= '018407028706153065349:v9jun2he5gc';
$keyword 	= urlencode('RIM');

$api 	= new GoogleCustomSearch();
$req 	= $api->customSearch($apikey, $seid, $keyword);
$i = 1;
foreach($req as $val)
{
	echo $i.' | '.$val['link'].'<br/>';
	$i++;
}
?>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include_once('GoogleCustomSearch.class.php');
$apikey 	= '';
$seid 		= '';
$keyword 	= urlencode('');

$api 	= new GoogleCustomSearch();
$req 	= $api->customSearch($apikey, $seid, $keyword);
$i = 1;
foreach($req as $val)
{
	echo $i.' | '.$val['link'].'<br/>';
	$i++;
}
?>

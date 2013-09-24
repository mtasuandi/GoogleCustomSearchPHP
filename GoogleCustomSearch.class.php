<?php
/**
 * @author 	: M Teguh A Suandi
 * @email 	: teguh.andro@gmail.com
 * @license	: http://creativecommons.org/licenses/by/3.0/
 * @date 	: Cirebon, 24 September 2013
 */
ini_set('max_execution_time', 1200);
if(!class_exists('GoogleCustomSearch'))
{
	class GoogleCustomSearch
	{
		public $start;
		public $end;
		
		public function __construct($start=1, $end=10)
		{
			$this->start	= $start;
			$this->end		= $end;
		}
		
		public function customSearch($apikey, $seid, $keyword)
		{
			for($start = 1; $start < ($this->end*10)+1; $start += 10)
			{
				$endpoint		= 'https://www.googleapis.com/customsearch/v1?';
				$params 		= array(
						'key' 	=> $apikey, 
						'cx' 	=> $seid,
						'start' => $start,
						'num' 	=> 10,
						'q' 	=> urlencode($keyword),);
				$buildparams 	= http_build_query($params);
				$apiurl 		= $endpoint.$buildparams;
				$options = array(
					'http'		=> array(
					'method'	=> "GET",
					'header'	=> "Accept-language: en\r\n" .
				        "Cookie: biztech=indonesia\r\n" . 
				        "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36"
					)
				);
				$context 	= stream_context_create($options);
				$search 	= file_get_contents($apiurl, false, $context);
				$response	= json_decode($search);
				$items 		= $response->items;
				
				foreach($items as $links)
				{
					$results[] 	= array('link' => $links->link);
				}
			}
			return $results;
		}
	}
}
?>

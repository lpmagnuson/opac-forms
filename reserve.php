<?php

//Use CURL to grab page
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
//For Development, hardcode record URL to pull page
//$html = "http://suncat.csun.edu/record=b3218656";

//In production, capture the URL of the referring URL
$html = getenv("HTTP_REFERER");
//For Development remove testing port
$html = str_replace('http://suncat.csun.edu:2082', 'http://suncat.csun.edu', $html);

//return the HTML of the referring page via CURL
$returned_content = get_data($html);

//Use DOM to find specific HTML elements to pass to form
$dom = new DOMDocument;
@$dom->loadHTML($returned_content);
$finder = new DomXPath($dom);
$classname="bibInfoData";

//Find the first bibInfoLabel on page
$first_label = $finder->query("//td[contains(@class, 'bibInfoLabel')]")->item(0);
  $label = $dom->saveHtml($first_label);
  $label = strip_tags($label);

//Find the first bibInfoData element
$first_element = $finder->query("//td[contains(@class, '$classname')]")->item(0);
  $first_element = $dom->saveHtml($first_element);
  $first_element = strip_tags($first_element);

//if the first bibInfoData element is author, title is the second element
if ($label == 'Author') {
  $author = $first_element;
  $titles = $finder->query("//td[contains(@class, '$classname')]")->item(1);
  $title = $dom->saveHtml($titles);
  $title = strip_tags($title); 
}   
    //if the first bibInfoData element is title, title is the first element
    else {
	  $author = "";
	  $title = $first_element;
}  
//get the link back to the record
$bibclass="bibRecordLink";
$biblinks = $finder->query("//div[contains(@class, '$bibclass')]")->item(0);
  $biblink = $dom->saveHtml($biblinks);
  //$biblink = strip_tags($biblink);
  $biblink = str_replace('<div class="bibRecordLink"><a id="recordnum" href="/', '', $biblink);
  $biblink = str_replace('"></a></div>', '', $biblink);

//get the location
$location = $finder->query("//tr[contains(@class, 'bibItemsEntry')]/td")->item(0);
  $location = $dom->saveHtml($location);
  $location = strip_tags($location);
  $location = substr($location, 3, -1);

//get the Call Number
$callnum = $finder->query("//tr[contains(@class, 'bibItemsEntry')]/td")->item(1);
  $callnum = $dom->saveHtml($callnum);
  $callnum = strip_tags($callnum);
  $callnum = substr($callnum, 3, -3);

//Redirect the user to form  
$redirect = "Location: http://laurenmagnuson.com/opac/form.php?title=" . urlencode($title) . "&author=" . urlencode($author) . "&biblink=suncat.csun.edu/" . urlencode($biblink) . "&callnum=" . urlencode($callnum) . "&location=" . urlencode($location); 
header( $redirect ) ;
?>
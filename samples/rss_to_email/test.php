<?php 

require_once("vendor/autoload.php");
require_once("conf.php");

use \Mailjet\Resources;

$html_part = file_get_contents("rss_to_email/template.html");

$mj = new \Mailjet\Client($API_KEY,$API_SECRET_KEY);

$rss = Feed::loadRss("http://www.forbes.com/most-popular/feed/");

$list=array();
foreach ($rss->item as $row) {
    $list[] = $row;
}

print(json_encode($list));

$params = array(
    "method" => "POST",
    "FromEmail" => $sender,
    "FromName" => "Mailjet Pilot",
    "Subject" => 'Your RSS',
    "Html-part" => $html_part,
    "MJ-TemplateLanguage" => true,
    "Vars" => array (
	"rss" => $list,
    ),
    "Recipients" => array(
		array( 
			"Email" => $recipients[0],
		)
	
    )
);

print_r($params);

$response = $mj->post(Resources::$Email, ['body' => $params]);

var_dump($response->request->getUrl()); 

var_dump($response->request->getFilters()); 

var_dump($response->request->getBody());

$response->success() && var_dump($response->getData());

?>


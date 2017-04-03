<?php 

require_once("vendor/autoload.php");
require_once("conf.php");

use \Mailjet\Resources;

//$html_part = file_get_contents("zigzag_loop/template.html");
$html_part = file_get_contents("zigzag_loop/template_design.html");


$mj = new \Mailjet\Client($API_KEY,$API_SECRET_KEY);


$params = array(
    "method" => "POST",
    "FromEmail" => $sender,
    "FromName" => "Mailjet Pilot",
    "Subject" => 'Our products',
    "Html-part" => $html_part,
    "MJ-TemplateLanguage" => true,
    "Vars" => array (
	'products' => [
			[
			'img' => 'http://191n.mj.am/img/191n/3s/x0o.png',
			'name' => 'TREK 1 :',
			'date' => '12 - 13 - 14 JUNE',
			'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Magna efficitur, eu semper augue semper. Aliquam erat volutpat.',
			'id' => 1		
			],
			[
			'img' => 'http://191n.mj.am/img/191n/3s/xmr.png',
			'name' => 'TREK 2 :',
			'date' => '12 - 13 - 14 JULY',
			'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Magna efficitur, eu semper augue semper. Aliquam erat volutpat.',
			'id' => 2		
			],
			[
			'img' => 'http://191n.mj.am/img/191n/3s/xm7.png',
			'name' => 'TREK 3 :',
			'date' => '12 - 13 - 14 AUGUST',
			'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Magna efficitur, eu semper augue semper. Aliquam erat volutpat.',
			'id' => 3		
			],
			[
			'img' => 'http://191n.mj.am/img/191n/3s/xmr.png',
			'name' => 'TREK 4 :',
			'date' => '12 - 13 - 14 SEPTEMBER',
			'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Magna efficitur, eu semper augue semper. Aliquam erat volutpat.',
			'id' => 4		
			]
	] 
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


<?php 

require_once("vendor/autoload.php");
require_once("conf.php");

use \Mailjet\Resources;

//$html_part = file_get_contents("ecommerce_receipt/template.html");
$html_part = file_get_contents("ecommerce_receipt/template_design.html");


$mj = new \Mailjet\Client($API_KEY,$API_SECRET_KEY);


$params = array(
    "method" => "POST",
    "FromEmail" => $sender,
    "FromName" => "Mailjet Pilot",
    "Subject" => 'Your receipt',
    "Html-part" => $html_part,
    "MJ-TemplateLanguage" => true,
    "Vars" => array (
	'products' => [
			[
			'name' => 'Minibar',
			'number' => 10,
			'price' => '$5.00',
			'totalprice' => '$50.00'
			],
			[
			'name' => 'Foot massage',
			'number' => 1,
			'price' => '$10.00',
			'totalprice' => '$10.00'
			],
			[
			'name' => 'Dinner',
			'number' => 2,
			'price' => '$50.00',
			'totalprice' => '$100.00'
			],
			[
			'name' => 'Nights',
			'number' => 2,
			'price' => '$150.00',
			'totalprice' => '$300.00'
			]
						
	] ,
	'vat'=> "$100.00",
	'totalprice'=> "$460.00"
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


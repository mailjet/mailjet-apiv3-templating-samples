<?php 

require_once("vendor/autoload.php");
require_once("conf.php");

use \Mailjet\Resources;

$html_part = file_get_contents("products_list/template.html");
//$html_part = file_get_contents("products_list/template_design.html");


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
			[
			'img' => 'http://191n.mj.am/img/191n/3s/x41.jpg',
			'name' => 'MAVA PULLOVER',
			'price' => '55€'		
			],[
			'img' => 'http://191n.mj.am/img/191n/3s/x4l.jpg',
			'name' => 'NEOS PURPLE SKIRT',
			'price' => '45€'
			],[
			'img' => 'http://191n.mj.am/img/191n/3s/x4m.jpg',
			'name' => 'JENSEN TOP',
			'price' => '78€'
			]
		],
		[
			[
			'img' => 'http://191n.mj.am/img/191n/3s/x42.jpg',
			'name' => 'LEADY JACKET',
			'price' => '110€'		
			],
			[
			'img' => 'http://191n.mj.am/img/191n/3s/x4p.jpg',
			'name' => 'FUNKY PANTS',
			'price' => '73€'
			],
			[
			'img' => 'http://191n.mj.am/img/191n/3s/x43.jpg',
			'name' => 'PINKY DRESS',
			'price' => '60€'
			]
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


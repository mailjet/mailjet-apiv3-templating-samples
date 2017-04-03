<?php 

require_once("vendor/autoload.php");
require_once("conf.php");

use \Mailjet\Resources;

$html_part = file_get_contents("electronic_ticket/template.html");

$mj = new \Mailjet\Client($API_KEY,$API_SECRET_KEY);


$params = array(
    "method" => "POST",
    "FromEmail" => $sender,
    "FromName" => "Mailjet Pilot",
    "Subject" => 'Your ticket to {{var:destination}}',
    "MJ-TemplateLanguage" => true,
    "Html-part" => $html_part,
			"Vars" => array( 
					"author" => "Emmanuel",
					"url" => "http://www.example.com",
					"question" => "How to create a notification system for questions?",
					"questiondetail" => "I would like to do a nice notification system",
					"answer" => "Use this example",
					"comment" => "Just commenting for fun",
					"view" => 1,
					"vote" => 2
				),
    "Recipients" => array(
		array( 
			"Email" => $recipients[0],
			"Vars" => array( 
					"firstclass" => true, 
					"chaufferedcar" => true,
					"business" => false, 
					"destination" => 'London'
				)
		),
		array( 
			"Email" => $recipients[1],
			"Vars" => array( 
					"firstclass" => true, 
					"chaufferedcar" => false,
					"business" => false, 
					"destination" => 'Paris'
				)
		),
		array( 
			"Email" => $recipients[2],
			"Vars" => array( 
					"firstclass" => false, 
					"chaufferedcar" => false,
					"business" => false, 
					"destination" => 'London'
				)
		),
		array( 
			"Email" => $recipients[3],
			"Vars" => array( 
					"firstclass" => true, 
					"chaufferedcar" => true,
					"business" => false, 
					"destination" => 'New York'
				)
		),
		array( 
			"Email" => $recipients[4],
			"Vars" => array( 
					"firstclass" => true, 
					"chaufferedcar" => true,
					"business" => false, 
					"destination" => 'London'
				)
		),
	
    )
);

$response = $mj->post(Resources::$Email, ['body' => $params]);

var_dump($response->request->getUrl()); 

var_dump($response->request->getFilters()); 

var_dump($response->request->getBody());

$response->success() && var_dump($response->getData());

?>


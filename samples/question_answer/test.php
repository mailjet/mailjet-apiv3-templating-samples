<?php 

require_once("vendor/autoload.php");
require_once("conf.php");

use \Mailjet\Resources;

$html_part = file_get_contents("question_answer/template.html");

$mj = new \Mailjet\Client($API_KEY,$API_SECRET_KEY);


$params = array(
    "method" => "POST",
    "FromEmail" => $sender,
    "FromName" => "Mailjet Pilot",
    "Subject" => '{{var:author}}{% if var:comment!="" and var:answer=="" %} commented on {% elseif var:comment!="" %} commented an answer on {% elseif var:answer!="" %} answered {% else %} asked {% endif %} {{var:question}}',
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
					"author" => "Emmanuel",
					"url" => "http://www.example.com",
					"question" => "How to create a notification system for questions?",
					"questiondetail" => "I would like to do a nice notification system",
					"answer" => "",
					"comment" => "",
					"view" => 1,
					"vote" => 2
				)
		),
		array( 
			"Email" => $recipients[1],
			"Vars" => array( 
					"author" => "Emmanuel",
					"url" => "http://www.example.com",
					"question" => "How to create a notification system for questions?",
					"questiondetail" => "I would like to do a nice notification system",
					"answer" => "Use this example",
					"comment" => "",
					"view" => 1,
					"vote" => 2
				)
		),
		array( 
			"Email" => $recipients[2],
			"Vars" => array( 
					"author" => "Emmanuel",
					"url" => "http://www.example.com",
					"question" => "How to create a notification system for questions?",
					"questiondetail" => "I would like to do a nice notification system",
					"answer" => "",
					"comment" => "Just commenting for fun",
					"view" => 1,
					"vote" => 2
				)
		),
		array( 
			"Email" => $recipients[3],
			"Vars" => array( 
					"author" => "Emmanuel",
					"url" => "http://www.example.com",
					"question" => "How to create a notification system for questions? dsf dsf dsfdsaf dsfds dfdasfd",
					"questiondetail" => "I would like to do a nice notification system fgfdfs df dsf dff fdsaf fdsfdsa",
					"answer" => "Use this example",
					"comment" => "Just commenting for fun",
					"view" => 1,
					"vote" => 2
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


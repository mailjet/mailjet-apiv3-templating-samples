<?php 

require_once("vendor/autoload.php");
require_once("conf.php");

use \Mailjet\Resources;

$html_part = file_get_contents("all_in_one_transac/template.html");

$mj = new \Mailjet\Client($API_KEY,$API_SECRET_KEY);


$params = array(
    "method" => "POST",
    "FromEmail" => $sender,
    "FromName" => "Mailjet Pilot",
    "Subject" => '{{var:firstname}}, {% if var:step == "registration" %}Thank you for registering{% elseif var:step == "confirmation" %}Please confirm your email{% elseif var:step == "3day" %}3 days already with us!!!{% elseif var:step == "badge" %}A new badge for you{% else %}Small message from us{% endif %}',
    "Html-part" => $html_part,
    "MJ-TemplateLanguage" => true,
    "Vars" => array (
	"firstname" => "",
	"step" => "", 
	"badge" => "",
	"level" => 0,
        "messagecontent" => ""
    ),
    "Recipients" => array(
		array( 
			"Email" => $recipients[0],
			"Vars" => array( 
					"firstname" => "Emmanuel1",
					"step" => "confirmation", 
				)
		),
		array( 
			"Email" => $recipients[1],
			"Vars" => array( 
					"firstname" => "Emmanuel2",
					"step" => "registration", 
				)
		),
		array( 
			"Email" => $recipients[2],
			"Vars" => array( 
					"firstname" => "Emmanuel3",
					"step" => "badge", 
					"badge" => "writer",
					"level" => 1,
				)
		),
		array( 
			"Email" => $recipients[3],
			"Vars" => array( 
					"firstname" => "Emmanuel4",
					"step" => "badge", 
					"badge" => "contributor",
					"level" => 4,
				)
		),
		array( 
			"Email" => $recipients[4],
			"Vars" => array( 
					"firstname" => "Emmanuel5",
					"step" => "3day"
				)
		),
		array( 
			"Email" => $recipients[5],
			"Vars" => array( 
					"firstname" => "Emmanuel6",
					"step" => "message",
					"messagecontent" => "Just a small Hello !!"
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


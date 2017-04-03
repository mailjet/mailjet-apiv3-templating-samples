<?php 

require_once("vendor/autoload.php");
require_once("conf.php");

use \Mailjet\Resources;

$html_part = file_get_contents("ecommerce/template.html");

$mj = new \Mailjet\Client($API_KEY,$API_SECRET_KEY);


$params = array(
    "method" => "POST",
    "FromEmail" => $sender,
    "FromName" => "Mailjet Pilot",
    "Subject" => '{{ var:firstname }}, {% if var:step == "confirmorder" %}Confirmation of purchase: {{ var:productname:"" }}{% elseif var:step == "confirmshipping" %}Your {{ var:productname:"" }} is coming your way{% elseif var:step == "unavailable" %}Your purchase is unavailable: {{ var:productname:"" }}{% elseif var:step == "refund" %}Refund of your purchase {{ var:productname:"" }}{% elseif var:step == "feedback" %}Please give us some feedback about your {{ var:productname:"" }}{% endif %}',
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
					"step" => "confirmorder", 
					"productname" => "Camera", 
					"productdescription" => "Description",
					"productimg" => "https://raw.githubusercontent.com/eboisgon/mailjet-template-api-samples/master/ecommerce/img/photo1.jpg", 
					"order_id" => "1111111",
					"delivery" => "2 EUR",
					"total_price" => "30 EUR"
				)
		),
		array( 
			"Email" => $recipients[1],
			"Vars" => array( 
					"firstname" => "Emmanuel2",
					"step" => "confirmshipping", 
					"productname" => "Shoes", 
					"productdescription" => "Description",
					"productimg" => "https://raw.githubusercontent.com/eboisgon/mailjet-template-api-samples/master/ecommerce/img/photo2.jpg", 
					"deliverytrackurl" => "#", 
					"delivery" => "UPS",
				)
		),
		array( 
			"Email" => $recipients[2],
			"Vars" => array( 
					"firstname" => "Emmanuel3",
					"step" => "unavailable",
					"reasonunavailable" => "Restocking",
					"productname" => "rubik's cube", 
					"productdescription" => "Description",
					"productimg" => "https://raw.githubusercontent.com/eboisgon/mailjet-template-api-samples/master/ecommerce/img/photo3.jpg", 
				)
		),
		array( 
			"Email" => $recipients[3],
			"Vars" => array( 
					"firstname" => "Emmanuel4",
					"step" => "refund", 
					"productname" => "Camera", 
					"productdescription" => "Description",
					"productimg" => "https://raw.githubusercontent.com/eboisgon/mailjet-template-api-samples/master/ecommerce/img/photo1.jpg", 
					"order_id" => "1111111",
					"delivery" => "2 EUR",
					"total_price" => "30 EUR"
				)
		),
		array( 
			"Email" => $recipients[4],
			"Vars" => array( 
					"firstname" => "Emmanuel5",
					"step" => "feedback", 
					"productname" => "Shoes", 
					"productdescription" => "Description",
					"productimg" => "https://raw.githubusercontent.com/eboisgon/mailjet-template-api-samples/master/ecommerce/img/photo2.jpg", 
				)
		)
	
    )
);

$response = $mj->post(Resources::$Email, ['body' => $params]);

var_dump($response->request->getUrl()); 

var_dump($response->request->getFilters()); 

var_dump($response->request->getBody());

$response->success() && var_dump($response->getData());

?>


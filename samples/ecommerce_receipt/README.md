#ECOMMERCE RECEIPT 

This example show how with the loops you can repeat pieces of your template. 
Here we display a list of articles purchased and the total of the purchase.

## Vars 

```php
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

```

## Template source

```html
{% for article in var:products %}
	{{ article.name }}
	{{article.number}}
	{{article.price}}
	{{article.totalprice}}
{% endfor%}
{{var:vat}}
{{var:totalprice}}
```

## Result

![Example 1](media/receipt.png)





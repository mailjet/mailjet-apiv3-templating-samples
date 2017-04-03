#PRODUCT LIST

This example show how with the loops you can repeat pieces of your template.

## Vars 

```
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
```

## Template source

```html
{% for line in var:products %}
	<ul>
	{% for product in line %}
         <li><img src="{{product.img}}">{{product.name}}<br>{{product.price}}</li>
	{% endfor %}
	</ul>
{% endfor %}
```

## Result

![Example 1](media/designed.png)




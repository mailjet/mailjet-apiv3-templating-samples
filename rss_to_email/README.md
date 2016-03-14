#RSS to EMAIL  

This example shows how with the loops you can repeat pieces of your template. 
This example download a RSS feed and push the articles information to the Mailjet Transational template.

## Vars 

We download a RSS feed from an external source.

## Template source

```html
<ul>
{% for article in var:rss %}
 <li><a href="{{article.link}}">{{article.title}}</a><br>{{article.description}}</li>
{% endfor %}
</ul>
```

## Result

![Example 1](media/rss2email.png)




#QUESTION, ANSWER and COMMENT notification (Quandora like)

This example can be used for notification of new question, new comment on a question, new comment on an answer and new answer.

In the test.php script, you can see that the subject also rely on templating language:

```
{{var:author}}{% if var:comment!="" and var:answer=="" %} commented on {% elseif var:comment!="" %} commented an answer on {% elseif var:answer!="" %} answered {% else %} asked {% endif %} {{var:question}}
```

## Vars 

```
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

```

## Template skeleton 

```

{% if var:comment!="" and var:answer=="" %} commented on {% elseif var:comment!="" %} commented an answer on {% elseif var:answer!="" %} answered {% else %} asked {% endif %}
 
{% if var:comment=="" and var:answer!="" %}

{% endif %}

{% if var:comment!="" %}

{% endif %}

{% if var:answer!="" and var:comment!="" %}

{% else %}

{% endif %}


{% if var:comment!="" %}

{% elseif var:answer!="" %}

{% else %}

{% endif %}

```


## Result

###Vars
```
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
```
###Result

![Example 1](media/question1.png)


###Vars
```
"Vars" => array( 
					"author" => "Emmanuel",
					"url" => "http://www.example.com",
					"question" => "How to create a notification system for questions?",
					"questiondetail" => "I would like t",
					"answer" => "Use this example",
					"comment" => "Just commenting for fun",
					"view" => 1,
					"vote" => 2
				)
```
###Result

![Example 2](media/question2.png)


###Vars
```
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
```
###Result

![Example 3](media/question3.png)


###Vars
```
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

```
###Result

![Example 4](media/question4.png)

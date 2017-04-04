# Templating language for everyone, from beginners to power users

We are developers, like you. And what we hate above all in coding is to repeat ourselves. [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) isn’t just a concept for us, and we strongly recommend code reuse... So when it comes to writing email templates, we want to provide our users with the best tools to produce content in the most efficient way possible.

To speed up the development of responsive emails, you may already know [MJML](https://mjml.io), the open-source email framework we’ve created. If you’re not familiar with it, [go check it out right away](https://mjml.io). You can thank us later.

But even if MJML can help you save quite a lot of time and ease the process, you’ll probably want more. We hear you.


## MJML and templating language, a superhero duo

Today, flexibility and personalization are a must-have in the email industry. Transactional emails imply more and more complex business logic, and one can often struggle trying to juggle a lot of different templates, when they could just have one personalized email that adapts to several use cases. Having a separate template for men and another one for women, or creating specific campaigns to recommend different things based on your customer's previous purchases is not viable.

It is in this kind of situations that a templating language comes in handy. OK, let’s be a bit naive and accept that you could write your own. But to be able to implement a tokenizer and a grammar, you need to have a good knowledge in the field and, at the end of the day, you might just be reinventing the wheel when you could have been focusing on your core business instead... You could instead use nice libraries such as [Handlebars](http://handlebarsjs.com/), [Jinja](http://jinja.pocoo.org/) or [Twig](http://twig.sensiolabs.org/), but then you’ll still need to write or host a dedicated service to handle the templating processing.


## OK. Too hard. So how can I master this, once and for all?

We have the solution. Because at Mailjet we know the value of a fully integrated templating language, we created [our own](https://dev.mailjet.com/guides/#transactional-templating), following the good patterns of the libraries mentioned previously, and with our [Transactional Send API](https://dev.mailjet.com/guides/#send-transactional-email) in mind. Our idea: one template to rule them all, just with a single API call.

## Pretty awesome, we know.

So, let’s recap: MJML for building responsive HTML emails without effort, plus a templating language to bring them to life with conditional blocks and variables. This combo can change your life as a developer. But, enough words, you’ll definitely want some action.

In this repository, you'll find four tutorials that will explain you step by step how to solve very common issues in template creation.

## Let's start! <img width="30px" src="http://www.szegedikettlebell.hu/images/Kepek/blogkepek/blog162/kezd_el_kettlebellt_szeged.jpg">

Ready to start? Jump on our tutorials:
* <a href="./receipt">How to create an e-receipt email template</a>
* Coming soon...

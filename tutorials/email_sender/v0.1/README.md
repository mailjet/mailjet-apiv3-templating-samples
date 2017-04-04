# Mailjet templating language console tool

This email sender tool is to be used in your console.

It has been built to help you test Mailjet's templating language and MJML.

## Prerequisites

First of all, you will need [Node.js](https://nodejs.org/en/download/) (this tool has been tested for versions >= v7.2.1).

You should have also a [Mailjet](https://www.mailjet.com/?utm_source=referrer&utm_medium=github&utm_campaign=tpl_lang_tutorial) account and a [valid API key](https://app.mailjet.com/support/what-are-the-api-key-and-secret-keys-how-should-i-use-them,109.htm?utm_source=referrer&utm_medium=github&utm_campaign=tpl_lang_tutorial). If you're not a client yet, you can [subscribe for a free account](https://app.mailjet.com/signup?utm_source=referrer&utm_medium=github&utm_campaign=tpl_lang_tutorial) (and send immediately up to 6000 free emails a month!). __Warning:__ don't use a disposable email address (gmail, yahoo, etc included), as you'll be likely to be blocked by our anti-spammer policy.

Finally, you'll need an access to the [MJML API](https://mjml.io/api?utm_source=referrer&utm_medium=github&utm_campaign=tpl_lang_tutorial), actually in [open beta](https://mjml.io/api?utm_source=referrer&utm_medium=github&utm_campaign=tpl_lang_tutorial).

## Installation

Download this tool directly or clone the parent directory.

To install dependencies, run: `npm install`

## Configuration

This tool uses two sets of API keys (_Send API_ and _MJML API_). You must provide the tool with a `.credentials` file, that contains the following environment variables:

```sh
MAILJET_API_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
MAILJET_API_SECRET=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
MJML_APPLICATION_ID=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
MJML_SECRET_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

## About your templates

A template is composed of two files, one for MJML, and the other to declare templating language's variables data.

These files must be created in a specific directory, matching the following pattern: `./templates/template-name`.

Your MJML file must be named `index.mjml`.

Your JSON variables file must be named `variables.json`.

## Run the tool

To run the tool, you can use the `start` script, with your template name as the single argument. For instance: `npm start template-name`

## Testing

If you want to modify this tool, we've provided you with a very succinct test suite (using [chai](chaijs.com) and [mocha](mochajs.org)). Feel free to improve it or write your own.

To run it, simply hit: `npm run test`

## Any questions?

Contact us via [api@mailjet.com](mailto://api@mailjet.com) or ping us on [Twitter](https://twitter.com/mailjetdev). We'll be glad to answer you and listen to your feedback.

## License

MIT License

Copyright (c) 2017 Mailjet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

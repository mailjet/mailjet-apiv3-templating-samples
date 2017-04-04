// general properties
module.exports = {
  FromEmail: 'gbetton@mailjet.com', // should be a validated address from your account
  FromName: 'grebett',
  Subject: '🐸 Templating language test 🐸 ',
  'Mj-Templateerrorreporting': 'gbetton@mailjet.com', // specify this address to access debug reports
  'MJ-TemplateLanguage': true, // mandatory
  Recipients: [{
    Email: "gregory.betton@gmail.com",
    Name: "grebett"
  }]
};

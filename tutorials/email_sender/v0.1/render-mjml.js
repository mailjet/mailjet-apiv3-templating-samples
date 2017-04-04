const chalk = require('chalk');

module.exports = function (mjml) {
  const MjmlClient = require('./services/mjml-api');
  const client = new MjmlClient(process.env.MJML_APPLICATION_ID, process.env.MJML_SECRET_KEY);

  return new Promise((resolve, reject) => {
    client.render(mjml).then(data => {
      if (data.errors.length) {
        // some errors are warnings and shoudn't be blocking... we resolve the html anyway
        // could change if the API distinguishes errors from warnings
        console.error(chalk.yellow('Errors/Warnings in your MJML'), data.errors);
        resolve(data.html);
      }
      resolve(data.html);
    }, clientError => {
      reject(clientError.body);
    });
  });
};

const fs = require('fs');
const path = require('path');
const chalk = require('chalk');

const emailConfig = require('./config');
const readFiles = require('./read-files');
const renderMJML = require('./render-mjml');
const sendEmail = require('./send-email');

// 1) read files
const {readFilesError, mjml, variables} = readFiles();

if (readFilesError) {
  console.error(chalk.red(readFilesError.message));
  return;
}

// 2) render MJML
renderMJML(mjml).then(html => {

  // 3) create email data by merging emailConfig and data from files
  let emailData = {
    'Html-part': html,
    Vars: variables
  };
  Object.assign(emailData, emailConfig);

  // 4) send email via the Send API (using mailjet-node)
  sendEmail(emailData).then(senderSuccess => {
    console.log(chalk.green(senderSuccess.message), senderSuccess.data);
  }, senderError => {
    console.error(chalk.red(senderError));
  });
}, renderError => {
  console.error(chalk.red(renderError.message), '\n', renderError);
});

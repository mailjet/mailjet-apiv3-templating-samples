module.exports = function (emailData) {
  const MailjetSender = require('./services/mailjet-sender');
  const sender = new MailjetSender(process.env.MAILJET_API_KEY, process.env.MAILJET_API_SECRET);

  return new Promise((resolve, reject) => {
    sender.send(emailData).then(response => {
      resolve({
        message : 'Congratulations, you\'ve just sent an email to the following recipients:',
        data: response.Sent
      });
    }, senderError => {
      // check the Send API error payload for more details
      reject(senderError);
    });
  });
};

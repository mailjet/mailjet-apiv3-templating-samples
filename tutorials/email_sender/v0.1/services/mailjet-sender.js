const nodeMailjet = require('node-mailjet');

// simple Sender class using the node.js mailjet wrapper
class Sender {
  // the mailjet sender needs valid credentials
  constructor(APIKey, APISecret) {
    if (typeof APIKey !== 'string' || typeof APISecret !== 'string') {
      throw new Error('missing or invalid parameters: APIKey and APISecret are both required and should be strings');
    }
    this.sender = nodeMailjet.connect(APIKey, APISecret).post('send');
  }

  // simple send method – see wrapper documentation for more infos: https://github.com/mailjet/mailjet-apiv3-nodejs
  send(data) {
    return new Promise((resolve, reject) => {
      this.sender.request(data).then(function (result) {
        resolve(JSON.parse(result.response.text));
      }, function (error) {
        reject(error);
      });
    });
  }
}

module.exports = Sender;

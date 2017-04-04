const request = require('request');

// MJML API has a single /render endpoint for now. We hardcode it.
const endpoint = 'https://api.mjml.io/v1/render';

class Client {
  // the mjml-api client needs valid credentials
  constructor(applicationID, APIPrivateKey) {
    if (typeof applicationID !== 'string' || typeof APIPrivateKey !== 'string') {
      throw new Error('missing or invalid parameters: applicationID and APIPrivateKey are both required and should be strings');
    }
    this.applicationID = applicationID;
    this.APIPrivateKey = APIPrivateKey;
  }

  // accepts a string and returns a Promise with the MJML API answer payload (see https://mjml.io/api/documentation/#tag-render)
  render(mjml) {
    if (typeof mjml !== 'string') {
      throw new Error('missing or invalid parameters: MJML is required and should be a string');
    }

    return new Promise((resolve, reject) => {
      request({
        url: endpoint,
        'auth': {
          'username': this.applicationID,
          'password': this.APIPrivateKey,
          'sendImmediately': true
        },
        headers: {
          'content-type': 'application/json',
        },
        method: 'POST',
        json: true,
        body: { mjml }
      }, function(error, response, body) {
        if (response.statusCode === 200 && !error) {
          resolve(body);
        } else {
          reject(response);
        }
      });
    });
  }
}

module.exports = Client;

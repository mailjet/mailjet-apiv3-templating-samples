const expect = require('chai').expect;
const chalk = require('chalk');
const Client = require('../services/mjml-api');

describe('c (Client instance)', () => {
  describe('constructor', () => {
    it('should be constructed with two string keys', () => {
      const c = new Client(process.env.MJML_APPLICATION_ID, process.env.MJML_SECRET_KEY);
      expect(c.applicationID).to.be.a('string');
      expect(c.APIPrivateKey).to.be.a('string');
    });

    it('should throw an error if missing required parameters', () => {
      expect(function () {
        new Client(undefined, process.env.MJML_SECRET_KEY);
        new Client(process.env.MJML_APPLICATION_ID, undefined);
      }).to.throw();
    });
  });

  describe('renderer', () => {
    it('should return an object', (done) => {
      const c = new Client(process.env.MJML_APPLICATION_ID, process.env.MJML_SECRET_KEY);
      c.render('<mjml><mj-body><mj-container><mj-section><mj-column><mj-text>Hello world!</mj-text></mj-column></mj-section></mj-container></mj-body></mjml>').then(body => {
        expect(body).to.be.an('object');
        expect(body.html).to.be.a('string');
        done();
      }, error => {
        console.error('error:', error.statusCode, error.statusMessage);
        done();
      });
    });
  });
});

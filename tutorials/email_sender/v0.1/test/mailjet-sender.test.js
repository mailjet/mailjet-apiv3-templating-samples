const expect = require('chai').expect;
const chalk = require('chalk');
const Sender = require('../services/mailjet-sender');

describe('s (Sender instance)', () => {
  describe('constructor', () => {
    it('should create a sender object', () => {
      const s = new Sender(process.env.MAILJET_API_KEY, process.env.MAILJET_API_SECRET);
      expect(s).to.be.an('object');
    });
  });

  describe('send method', () => {
    it('should return an object', (done) => {
      const s = new Sender(process.env.MAILJET_API_KEY, process.env.MAILJET_API_SECRET);
      const data = require('../config');
      data['Text-part'] = '{{var:title}} This is a TEST EMAIL!';
      data['Html-part'] = '<h1>{{var:title}}</h1><p>This is a <strong>TEST EMAIL!</strong></p>';
      data['Vars'] = {
        title: 'Hello world!'
      };

      s.send(data).then(response => {
        expect(response).to.be.an('object');
        expect(response.Sent).to.be.an('array');
        done();
      }, error => {
        console.error('error', error);
        done();
      });
    });
  });
});

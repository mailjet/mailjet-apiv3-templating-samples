module.exports = function () {
  const fs = require('fs');
  const path = require('path');
  const templateName = process.argv[2];
  const templatePath = `./templates/${templateName}`;

  try {
    fs.readdirSync(templatePath);
  } catch (e) {
    if (e.code === 'ENOENT') {
      return {
        readFilesError: {
          message: 'Error: this template does not exist.'
        }
      };
    }
  }
  // should also check here if index.mjml and variables.json exist
  let mjml = fs.readFileSync(path.join(templatePath, 'index.mjml')).toString();
  let variables = JSON.parse(fs.readFileSync(path.join(templatePath, 'variables.json')).toString());
  return {readFilesError: null, mjml, variables};
};

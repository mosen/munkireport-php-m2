switch (process.env.NODE_ENV) {
  case "production":
    module.exports = require('./webpack.config.prod');
    break;
  case "development":
    module.exports = require('./webpack.config.hmr');
    break;
  default:
    console.error('Unsupported NODE_ENV: ' + process.env.NODE_ENV);
}

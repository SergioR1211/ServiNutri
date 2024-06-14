const connection = require("../../connection");

function getAlimentos(){
    const query = 'SELECT * FROM alimentos';
    return new Promise((resolve, reject) => {
        connection.query(query, (err, results) => {
            if (err) {
              reject(err)
            } else {
              resolve(results)
            }
          });
    })
  };

  module.exports = { getAlimentos }
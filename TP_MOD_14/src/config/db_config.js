const mysql = require('mysql2');

const dbConnection = mysql.createPool({
  host: 'localhost', 
  user: 'root',
  password: '',
  database: 'db_movie_web_14',
  port: 3306,
});

module.exports = dbConnection.promise();

const connection = require("../../connection");

/**
 *
 * @file auth.controller.js
 * @description Controladores para la autenticación.
 * @param {string} username - Nombre de usuario.
 * @param {string} password - Contraseña del usuario.
 * @returns {Promise<Object>} - Promesa que resuelve con la respuesta de autenticación
 */

function loginUser(username, password) {
  return new Promise((resolve, reject) => {
    //Aqui se hace la query a la base de datos y dependiendo de lo que mande, mandamos una respuesta correcta con resolve, o si sale un error con reject.
    let query = `Select * from usuarios where correo = '${username}' and clave = '${password}'`;
    console.log(query);
    connection.query(query, (err, results, fields) => {
      if (err) {
        reject(err);
        return;
      }
      resolve(results);
    });
  });
}

function createUser(nombre_completo, username, user, password) {
  return new Promise((resolve, reject) => {
    let query = `INSERT INTO usuarios (nombre_completo, correo, usuario, clave) VALUES ('${nombre_completo}','${username}','${user}','${password}')`;
    connection.query(query, [nombre_completo, username, user, password], (err, results, fields) => {
      if (err) {
        reject(err);
        return;
      }
      resolve({ message: "Usuario creado exitosamente" });
    });
  });
}

function validAuth(token) {
  return new Promise((resolve, reject) => {
    // Simulación de validación de autenticación
    if (token === "validToken") {
      resolve({ message: "Token is valid" });
    } else {
      reject(new Error("Invalid token"));
    }
  });
}

const getAlimentos = (req, res) => {
  const query = 'SELECT * FROM alimentos';
  connection.query(query, (err, results) => {
    if (err) {
      res.status(500).send(err);
    } else {
      res.json(results);
    }
  });
};



module.exports = { loginUser, createUser, validAuth };

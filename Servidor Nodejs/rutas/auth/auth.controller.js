/**
 * @file auth.controller.js
 * @description Controladores para la autenticación.
 * Función para autenticar al usuario.
 * @param {string} username - Nombre de usuario.
 * @param {string} password - Contraseña del usuario.
 * @returns {Promise<Object>} - Promesa que resuelve con la respuesta de autenticación.
 * Función para crear un nuevo usuario.
 * @param {string} username - Nombre de usuario.
 * @param {string} password - Contraseña del usuario.
 * @returns {Promise<Object>} - Promesa que resuelve con la respuesta de creación.
 * Función para validar la autenticación del usuario.
 * @param {string} token - Token de autenticación.
 * @returns {Promise<Object>} - Promesa que resuelve con la validación de autenticación.
 * 
 */

function loginUser(username, password){
   return new Promise((resolve, reject) => {
    //Aqui se hace la query a la base de datos y dependiendo de lo que mande, mandamos una respuesta correcta con resolve, o si sale un error con reject.
    if (username == 'testuser' && password == 'testpass') {
      resolve({ success: true });
    } else {
      reject('Invalid credentials');
    }
    //resolve(true);
   })
}

function createUser(username, password) {
  return new Promise((resolve, reject) => {
    // Simulación de creación de usuario
    if (username && password) {
      resolve({ message: 'User created successfully' });
    } else {
      reject(new Error('User creation failed'));
    }
  });
}

function validAuth(token) {
  return new Promise((resolve, reject) => {
    // Simulación de validación de autenticación
    if (token === 'validToken') {
      resolve({ message: 'Token is valid' });
    } else {
      reject(new Error('Invalid token'));
    }
  });
}


module.exports = {loginUser, createUser, validAuth};
/**
 * @file auth.route.js
 * @description Rutas de autenticación.
 * @route POST /auth/login
 * @param {Object} req - Objeto de solicitud de Express.
 * @param {Object} res - Objeto de respuesta de Express.
 */

/**
 * @swagger
 * /auth/login:
 *   post:
 *     summary: Iniciar sesión
 *     description: Iniciar sesión con credenciales de usuario.
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               username:
 *                 type: string
 *               password:
 *                 type: string
 *     responses:
 *       200:
 *         description: Inicio de sesión exitoso
 *       400:
 *         description: Faltan datos en la solicitud
 *       500:
 *         description: Error interno del servidor
 */

const { response } = require('../../index');
const { loginUser, createUser, validAuth } = require('./auth.controller');
const router = require('express').Router();

//Esta ruta es de tipo post y te sirve para iniciar sesion
router.post('/login', (req , res) => {
    //Recibir datos de la ruta
    const username = req.body.username;
    const password = req.body.password;
    
    //Validar si llegaron los datos
    if(username && password){
        //Usualmente aqui se hace referencia al controller para validar los datos en la base de datos
        //En este caso es auth.controller ahi estarian las funciones 
        loginUser(username, password)
        .then((response) => { 
            //Si llegaron mandar un mensaje de que todo salio bien
            res.status(200).send("All Ok! You are logged");
        })
        .catch((error) => {
            res.status(500).send("Server Internal Error. Something happened on the server.")
        })
    }else{
        //Si no llegaron mandar un codigo de que faltaron datos
        res.status(400).send("Bad request. missing data request for the route auth/login");
    }
})

/**
 * @swagger
 * /auth/createUser:
 *   post:
 *     summary: Crear un nuevo usuario
 *     description: Crear un nuevo usuario con nombre de usuario y contraseña.
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               username:
 *                 type: string
 *               password:
 *                 type: string
 *     responses:
 *       201:
 *         description: Usuario creado exitosamente
 *       400:
 *         description: Faltan datos en la solicitud
 *       500:
 *         description: Error interno del servidor
 */

router.post('/createUser', (req, res) => {
    const username = req.body.username;
    const password = req.body.password;

    if (username && password) {
        createUser (username, password)
        .then((response) => {
            console.log("Error: ", error);
            res.status(201).send("User created successfully");
        })
        .catch((error) => {
            console.log("Error: ", error);
            res.status(500).send("Server Internal Error. Something happened on the server.");
        });
    } else {
        res.status(400).send("Bad request. Missing data request for the the route auth/createUser");
    }
});

/**
 * @swagger
 * /auth/validAuth:
 *   post:
 *     summary: Validar autenticación del usuario
 *     description: Validar la autenticación del usuario con un token.
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               token:
 *                 type: string
 *     responses:
 *       200:
 *         description: Token válido
 *       400:
 *         description: Faltan datos en la solicitud
 *       401:
 *         description: Token inválido
 *       500:
 *         description: Error interno del servidor
 */

router.post('/validAuth', (req, res) => {
    const token = req.body.token;
  
    if (token) {
      validAuth(token)
        .then((response) => {
          res.status(200).send("Token is valid");
        })
        .catch((error) => {
          console.log("Error: ", error);
          res.status(401).send("Invalid token");
        });
    } else {
      res.status(400).send("Bad request. missing data request for the route auth/validAuth");
    }
  });

module.exports = router;
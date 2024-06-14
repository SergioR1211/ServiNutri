/**
 * @file login.route.js
 * @description Rutas de autenticación.
 * @route POST /login/login
 * @param {Object} req - Objeto de solicitud de Express.
 * @param {Object} res - Objeto de respuesta de Express.
 */

/**
 * @swagger
 * /login/login:
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
const { loginUser, createUser, validlogin, getAlimentos } = require('./login.controller');
const router = require('express').Router();

//Esta ruta es de tipo post y te sirve para iniciar sesion
router.post('/login', (req , res) => {
    //Recibir datos de la ruta
    const username = req.body.username;
    const password = req.body.password;
    
    //Validar si llegaron los datos
    if(username && password){
        //Usualmente aqui se hace referencia al controller para validar los datos en la base de datos
        //En este caso es login.controller ahi estarian las funciones 
        loginUser(username, password)
        .then((response) => { 
            //Si llegaron mandar un mensaje de que todo salio bien
            res.status(200).send({done: true});
        })
        .catch((error) => {
            console.log(error)
            res.status(500).send("Server Internal Error. Something happened on the server.")
        })
    }else{
        //Si no llegaron mandar un codigo de que faltaron datos
        res.status(400).send("Bad request. missing data request for the route login/login");
    }
})

/**
 * @swagger
 * /login/createUser:
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

router.post('/create', async (req, res) => {
    const { nombre_completo, username, user, password } = req.body;
    try {
      const result = await createUser(nombre_completo, username, user, password);
      res.status(201).send({done: true});
    } catch (err) {
      console.error(err); // Asegúrate de loggear el error para debuguear
      res.status(500).json({ error: err.message });
    }
  });

/**
 * @swagger
 * /login/validlogin:
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

router.post('/validlogin', (req, res) => {
    const token = req.body.token;
  
    if (token) {
      validlogin(token)
        .then((response) => {
          res.status(200).send("Token is valid");
        })
        .catch((error) => {
          console.log("Error: ", error);
          res.status(401).send("Invalid token");
        });
    } else {
      res.status(400).send("Bad request. missing data request for the route login/validlogin");
    }
  });


module.exports = router;
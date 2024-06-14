const app = require('express')();
const cors = require('cors');
const parser = require('body-parser');
require('dotenv').config();
//Importamos la conexion con la base de datos en mongoose
const conexion = require('./conexion');
conexion();
const connection = require('./connection');

app.use(cors());
app.use(parser.json());
app.use(parser.urlencoded({extended: true}));

/*
El Objetivo de las rutas es crear links para que clientes ajenos a nosostros puedan acceder al servidor y manipular datos, ya se en una base de datos o cosas externas
Importamos la ruta que se va a usar
para esto necesitamos entender como se crea una ruta, estas rutas se alojan en la direccion Server> Rutas, sin embargo para poder entender como se forman las acciones que hace la ruta y su objetivo 
es necesario ir a Server > Modelos y seguir el ejemplo escrito.
*/
const Modelo1Ruta = require("./rutas/detalles/Rutas/Modelo1Ruta");
app.use("/Registro", Modelo1Ruta);


const loginRouter = require('./rutas/login/login.route.js');
app.use('/login', loginRouter);

const ComidasRouter = require('./rutas/comidas/comidas.route.js');
app.use('/comida', ComidasRouter);

const CitasRouter = require('./rutas/citas/citas.router.js')
app.use('/citas', CitasRouter);


app.listen(5000, () => {
    console.log("Servidor ejecutandose en el puerto 5000");
})


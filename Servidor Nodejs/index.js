const app = require('express')();
const cors = require('cors');
const parser = require('body-parser');
require('dotenv').config();

const connection = require('./connection');

app.use(cors());
app.use(parser.json());
app.use(parser.urlencoded({extended: true}));

const loginRouter = require('./rutas/login/login.route.js');
app.use('/login', loginRouter);

const ComidasRouter = require('./rutas/comidas/comidas.route.js');
app.use('/comida', ComidasRouter);

const CitasRouter = require('./rutas/citas/citas.router.js')
app.use('/citas', CitasRouter);


app.listen(5000, () => {
    console.log("Servidor ejecutandose en el puerto 5000");
})


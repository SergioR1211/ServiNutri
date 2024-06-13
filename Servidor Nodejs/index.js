const app = require('express')();
const cors = require('cors');
const parser = require('body-parser');

app.use(cors());
app.use(parser.json());
app.use(parser.urlencoded({extended: true}));

const AuthRouter = require('./rutas/auth/auth.route');
app.use('/auth', AuthRouter);



app.listen(5000, () => {
    console.log("Servidor ejecutandose en el puerto 5000");
})


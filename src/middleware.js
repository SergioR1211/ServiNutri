const session = require('express-session');

const sessionMiddleware = session({
    secret: 'tu_secreto', // Cambia esto por una cadena secreta segura
    resave: false,
    saveUninitialized: true,
    cookie: { secure: false } // Asegúrate de que sea `true` si usas HTTPS
});

module.exports = sessionMiddleware;
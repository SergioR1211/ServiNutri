const express = require('express');
const router = express.Router();
const bcrypt = require('bcryptjs');
const db = require('./db');

// Registro de usuario
router.post('/register', (req, res) => {
    const { nombre, correo, usuario, clave } = req.body;

    db.query('SELECT * FROM usuarios WHERE correo = ?', [correo], (err, results) => {
        if (err) return res.status(500).json({ error: err.message });
        if (results.length > 0) return res.status(400).json({ message: 'Correo ya registrado' });

        db.query('SELECT * FROM usuarios WHERE usuario = ?', [usuario], (err, results) => {
            if (err) return res.status(500).json({ error: err.message });
            if (results.length > 0) return res.status(400).json({ message: 'Usuario ya registrado' });

            const hashedPassword = bcrypt.hashSync(clave, 8);

            const query = 'INSERT INTO usuarios (nombre_completo, correo, usuario, clave) VALUES (?, ?, ?, ?)';
            db.query(query, [nombre, correo, usuario, hashedPassword], (err) => {
                if (err) return res.status(500).json({ error: err.message });
                res.status(201).json({ message: 'Usuario registrado exitosamente' });
            });
        });
    });
});

// Login de usuario
router.post('/login', (req, res) => {
    const { correo, clave } = req.body;

    db.query('SELECT * FROM usuarios WHERE correo = ?', [correo], (err, results) => {
        if (err) return res.status(500).json({ error: err.message });
        if (results.length === 0) return res.status(400).json({ message: 'Usuario no encontrado' });

        const usuario = results[0];

        if (!bcrypt.compareSync(clave, usuario.clave)) {
            return res.status(400).json({ message: 'Contraseña incorrecta' });
        }

        req.session.usuario = usuario;
        res.status(200).json({ message: 'Login exitoso', usuario: usuario.correo });
    });
});

// Verificar si el usuario está autenticado
router.get('/check-auth', (req, res) => {
    if (req.session.usuario) {
        res.status(200).json({ authenticated: true, usuario: req.session.usuario });
    } else {
        res.status(200).json({ authenticated: false });
    }
});

module.exports = router;

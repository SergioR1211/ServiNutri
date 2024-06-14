const router = require('express').Router();
const {getAlimentos} = require('./comidas.controller.js');

router.get('/alimentos', (req, res) => {
    getAlimentos()
    .then((data) => {
        res.status(200).json(data);
    })
    .catch((err) => {
        res.status(500).send(err);
    })
});

module.exports = router
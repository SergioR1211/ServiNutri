const express = require('express');
const router = express.Router();
const citasController = require('./citas.controller');

router.post('/create_citas', (req, res) => {
  citasController.createCita(req.body)
    .then(cita => res.status(201).json(cita))
    .catch(error => res.status(400).send(error));
});

router.get('/citas', (req, res) => {
  citasController.getAllCitas()
    .then(citas => res.json(citas))
    .catch(error => res.status(500).send(error));
});

router.get('/citas/:id', (req, res) => {
  citasController.getCitaById(req.params.id)
    .then(cita => res.json(cita))
    .catch(error => res.status(404).send(error));
});

router.put('/citas/:id', (req, res) => {
  citasController.updatedCita(req.params.id, req.body)
    .then(cita => res.json(cita))
    .catch(error => res.status(400).send(error));
});

router.delete('/citas/:id', (req, res) => {
  citasController.deleteCita(req.params.id)
    .then(message => res.send(message))
    .catch(error => res.status(404).send(error));
});

module.exports = router;

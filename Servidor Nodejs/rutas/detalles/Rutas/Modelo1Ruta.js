const express = require('express');
//Como vamos a hacer uso de rutas necesitamos crear esta constante
const route = express.Router();
//Importamos las funciones del controlador
const {CrearDetalle, EliminarDetalle, ActualizarDetalle, ObtenerDetalles} = require('../Controles/Modelo1Control');


/*
para llamar a las rutas podemos hacerlo de varias maneras pero para simplificar vamos a usar dos. El metodo get y post
usualmente cuando se usa get no necesitamos mandar datos solo se llama para obtener datos del servidor mientras que post si
require de datos para crear procesos en el servidor

route.get 
route.post
*/

/************************************************************************************************ */
// Ruta para crear un nuevo registro
route.post("/CrearDetalle", async (req, res) => {
      const { id_lugar, lugar } = req.body;
      if(id_lugar && lugar){
        CrearDetalle(id_lugar, lugar).then((data) => {
            res.status(200).send(data);
           })
           .catch((err) => {
            console.log(err);
            res.status(500).send(err);
           })
      }else{
        res.stauts(400).send("bad request")
      }
});

// Ruta para actualizar un registro por su id_lugar y posición de lugar en el array
route.put("/ActualizarDetalle/:id_lugar/:posicion", async (req, res) => {
  try {
    const id_lugar = req.params.id_lugar;
    const posicion = req.params.posicion;
    const { lugar } = req.body;

    // Llama a la función del controlador para actualizar el detalle
    const resultado = await ActualizarDetalle(id_lugar, posicion, lugar);

    console.log("Detalle actualizado");
    console.log(resultado);
    res.status(200).send("Detalle actualizado");
  } catch (error) {
    console.error("Error al actualizar Detalle");
    console.error(error);
    res.status(500).send("Error al actualizar Detalle");
  }
});


// Ruta para eliminar un registro por su id_lugar y posición de lugar en el array
route.delete("/EliminarDetalle/:id_lugar/:posicion", async (req, res) => {
  try {
    const id_lugar = req.params.id_lugar;
    const posicion = req.params.posicion;

    // Llama a la función del controlador para eliminar el detalle
    const resultado = await EliminarDetalle(id_lugar, posicion);

    console.log("Detalle eliminado");
    console.log(resultado);
    res.status(200).send("Detalle eliminado");
  } catch (error) {
    console.error("Error al eliminar el Detalle");
    console.error(error);
    res.status(500).send("Error al eliminar el Detalle");
  }
});
// Ruta para obtener todos los registros
route.get("/ObtenerDetalles", async (req, res) => {
  try {
    // Llama a la función del controlador para obtener todos los detalles
    const registros = await ObtenerDetalles();

    console.log("Mandando Detalles");
    console.log(registros);
    res.status(200).send(registros);
  } catch (error) {
    console.error("Error al obtener Detalles");
    console.error(error);
    res.status(500).send("Error al obtener Detalles");
  }
});

module.exports = route;
//Es necesario importar el modelo con el cual se va a estar trabajando y cada modelo tiene un controlador
//Un control es un archivo donde realizaremos todas las acciones para manipular el modelo, dicho de otra forma dar una estructura para poder manipular los datos
const Modelo1 = require('../Modelos/Modelo1');

//Funcion para crear un nuevo registro
// Función para crear un nuevo registro
async function CrearDetalle(id_lugar, lugar) {
    const nuevoRegistro = new Modelo1({
        id_lugar,
        lugar
    });

    return await nuevoRegistro.save();
}

// Función para obtener todos los registros
async function ObtenerDetalles() {
    return await Modelo1.find();
}

// Función para eliminar un registro por su id_lugar y posición en el array
async function EliminarDetalle(id_lugar, posicion) {
    const resultado = await Modelo1.findOneAndUpdate(
        { id_lugar },
        { $pull: { lugar: { _id: posicion } } },
        { new: true }
    );
    return resultado;
}

// Función para actualizar un registro por su id_lugar y posición en el array
async function ActualizarDetalle(id_lugar, posicion, nuevoLugar) {
    const resultado = await Modelo1.findOneAndUpdate(
        { id_lugar, 'lugar._id': posicion },
        { $set: { 'lugar.$': nuevoLugar } },
        { new: true }
    );
    return resultado;
}
//Se exportan las funciones que creamos hacia rutas
module.exports = {CrearDetalle, ObtenerDetalles, EliminarDetalle,ActualizarDetalle};
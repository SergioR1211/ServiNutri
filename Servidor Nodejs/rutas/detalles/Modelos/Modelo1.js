const {Schema, model} = require('mongoose');
//Se importan Schema y model de mongoose que son necesarios para la creacion del modelo
//Un modelo en mongoose es la estructura de como se van a guardar los datos en la bd
//Es equivalente a una tabla en mySql pero sigue una sintaxis diferente para su creacion


const citaSchema = new Schema({
    id_lugar: {
        type: Number,
        unique: true,
        required: true
    },
    lugar: [{
        nombre: {
            type: String,
            required: true
        },
        direccion: {
            type: String,
            required: true
        },
        ciudad: {
            type: String,
            required: true
        },
        estado: {
            type: String,
            required: true
        },
        codigo_postal: {
            type: Number,
            required: true
        },
        pais: {
            type: String,
            required: true
        }
    }]
});


const modelo = model("Modelo1", citaSchema); //Se crea el modelo
module.exports = modelo;// se exporta a los Controles
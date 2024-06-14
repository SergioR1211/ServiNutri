//Se require instalar mongoose para este paso
const mongoose = require('mongoose');

//Creamos la funcion para la conexion a la base de datos

const URI = 'mongodb://localhost:27017/Citas';

async function _connectDB() {
    try {
        await mongoose.connect(URI, { useNewUrlParser: true, useUnifiedTopology: true });
        console.log('MongoDB connected');
    } catch (error) {
        console.error('MongoDB connection error:', error.message);
        process.exit(1);  // Salir de la aplicación si hay un error en la conexión
    }

    mongoose.connection.on('disconnected', () => {
        console.log('Disconnected from MongoDB');
    });

    mongoose.connection.on('error', err => {
        console.error(`MongoDB connection error: ${err}`);
    });
}

//Exportamos la funcion
module.exports = _connectDB;
const connection = require("../../connection");

function createCita(data) {
  const { Nombre_Paciente, genero, edad, correo, fecha, hora, lugar, descripcion, nutriologo } = data;
  
  return new Promise((resolve, reject) => {
    if (!Nombre_Paciente || !genero || !edad || !correo || !fecha || !hora || !lugar || !descripcion || !nutriologo) {
      reject("Bad request. Missing data for creating a cita.");
    }

    const query = `INSERT INTO citass (Nombre_Paciente, genero, edad, correo, fecha, hora, lugar, descripcion, nutriologo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)`;
    const values = [Nombre_Paciente, genero, edad, correo, fecha, hora, lugar, descripcion, nutriologo];

    connection.query(query, values, (err, result) => {
      if (err) {
        reject("Server Internal Error. Something happened on the server.");
      } else {
        resolve({ id: result.insertId, ...data });
      }
    });
  });
}

function getAllCitas() {
  const query = 'SELECT * FROM citass';

  return new Promise((resolve, reject) => {
    connection.query(query, (err, results) => {
      if (err) {
        reject("Server Internal Error. Something happened on the server.");
      } else {
        resolve(results);
      }
    });
  });
}

function getCitaById(id) {
  const query = 'SELECT * FROM citass WHERE id = ?';
  const values = [id];

  return new Promise((resolve, reject) => {
    connection.query(query, values, (err, results) => {
      if (err) {
        reject("Server Internal Error. Something happened on the server.");
      } else if (results.length === 0) {
        reject('Cita not found');
      } else {
        resolve(results[0]);
      }
    });
  });
}

function updateCita(id, data) {
  const { Nombre_Paciente, genero, edad, correo, fecha, hora, lugar, descripcion, nutriologo } = data;
  const query = `UPDATE citass SET Nombre_Paciente = ?, genero = ?, edad = ?, correo = ?, fecha = ?, hora = ?, lugar = ?, descripcion = ?, nutriologo = ? WHERE id = ?`;
  const values = [Nombre_Paciente, genero, edad, correo, fecha, hora, lugar, descripcion, nutriologo, id];

  return new Promise((resolve, reject) => {
    connection.query(query, values, (err, result) => {
      if (err) {
        reject("Server Internal Error. Something happened on the server.");
      } else if (result.affectedRows === 0) {
        reject('Cita not found');
      } else {
        resolve({ id, ...data });
      }
    });
  });
}

function deleteCita(id) {
  const query = 'DELETE FROM citass WHERE id = ?';
  const values = [id];

  return new Promise((resolve, reject) => {
    connection.query(query, values, (err, result) => {
      if (err) {
        reject("Server Internal Error. Something happened on the server.");
      } else if (result.affectedRows === 0) {
        reject('Cita not found');
      } else {
        resolve("Cita deleted successfully");
      }
    });
  });
}

module.exports = {
  createCita,
  getAllCitas,
  getCitaById,
  updateCita,
  deleteCita
};

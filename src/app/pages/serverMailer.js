const express = require("express");
const cors = require("cors"); // Importa el paquete cors
const app = express();
const apiMailer = require("./apiMailer.js"); // Importa la lógica de envío de correos

// Habilita CORS para permitir solicitudes desde cualquier origen
app.use(cors());

// Configura la ruta para enviar correos
app.post("/sendEmail", async (req, res) => {
  // const correo = req.body.correo; // Aquí obtendrías el correo desde la solicitud
  try {
    await apiMailer.enviarMail(); // Llama a la función de envío de correos
    res.status(200).send("Correo enviado exitosamente");
  } catch (error) {
    console.error("Error al enviar el correo:", error);
    res.status(500).send("Error al enviar el correo");
  }
});

// Configura el puerto en el que escuchará el servidor
const port = 3000;
const server = app.listen(port, () => {
  console.log(`Servidor escuchando en el puerto ${port}`);
});

process.on("SIGINT", () => {
  server.close(() => {
    console.log("Servidor cerrado");
    process.exit(0);
  });
});

/* 
1. En '\Agrocommerce\src\app\pages' correr 'node serverMailer.js'

*/

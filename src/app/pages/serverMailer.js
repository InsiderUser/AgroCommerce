const express = require("express");
const app = express();
const apiMailer = require("./apiMailer.js"); // Importa la lógica de envío de correos

// Configura la ruta para enviar correos
app.post("/sendEmail", async (req, res) => {
  const correo = req.body.correo; // Aquí obtendrías el correo desde la solicitud
  try {
    await apiMailer.sendEmail(correo); // Llama a la función de envío de correos
    res.status(200).send("Correo enviado exitosamente");
  } catch (error) {
    console.error("Error al enviar el correo:", error);
    res.status(500).send("Error al enviar el correo");
  }
});

// Configura el puerto en el que escuchará el servidor
const port = 3000;
app.listen(port, () => {
  console.log(`Servidor escuchando en el puerto ${port}`);
});

/* 
Para correr el sv"
  .PS Set-ExecutionPolicy RemoteSigned/Restricted
  .pm2 start serverMailer.js
  .pm2 stop all


*/

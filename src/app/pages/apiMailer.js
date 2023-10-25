const nodeMailer = require("nodemailer");

enviarMail = async (correo) => {
  const config = {
    host: "smtp.gmail.com",
    port: 465,
    secure: true,
    auth: {
      // TODO: replace `user` and `pass` values from <https://forwardemail.net>
      user: "agrocommercelr@gmail.com",
      pass: "mvdd ihaw slqz ibpv",
    },
  };

  const mensaje = {
    from: '"AgroCommerce" <agrocommercele@gmail.com>', // sender address
    to: correo, // list of receivers
    subject: "NOTIFICACION DE RIEGO", // Subject line
    text: "Esto es una notifiacion automatizada", // plain text body
    html: 'Estimado usuario:<br><b>El riego de tus cultivos comenzará en breve</b> de acuerdo al intervalo establecido en la configuracion, ¡prepárate para el éxito de tus cultivos!<br><br>•Si deseas modificar el intervalo, lo podes hacer clickeando sobre <a href="http://localhost/agrocommerce/src/app/pages/settings.php">este vínculo</a><br>•Si tenes alguna pregunta o precisas asistencia adicional, en nuestra sección de <a href="http://localhost/agrocommerce/src/app/pages/support.php">soporte</a> podrás revisar las preguntas frecuentes o contactarte directamente con nosotros.<br><br>Saludos,<br>El equipo de Agrocommerce<br><i>Este es un mensaje automático. Por favor, no responda a este correo</i><br><img src="https://drive.google.com/file/d/1Jj0S0RMtsUq81l29qj9BcRKY_1C1ZuBO/view?usp=sharing">.', // html body
  };

  const transporter = nodeMailer.createTransport(config);
  const info = await transporter.sendMail(mensaje);
};
// enviarMail(); Evita el envio automatico al correr el servidor

module.exports = {
  enviarMail,
};

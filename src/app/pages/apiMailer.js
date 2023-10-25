const nodeMailer = require("nodemailer");

enviarMail = async () => {
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
    // to: `${correo}`, // list of receivers
    to: `gonzaruizok@gmail.com`,
    subject: "Notificacion de riego", // Subject line
    text: "Esto es una notifiacion automatizada", // plain text body
    html: "Se le notifica que <b>en breve comenzará</b>, segun el intervalo que ha establecido en nuestra plataforma.", // html body
  };

  const transporter = nodeMailer.createTransport(config);
  const info = await transporter.sendMail(mensaje);
};
// enviarMail(); Evita el envio automatico al correr el servidor

module.exports = {
  enviarMail,
};

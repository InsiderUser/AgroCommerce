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
    from: '"Fred Foo 👻" <agrocommercele@gmail.com>', // sender address
    // to: `${correo}`, // list of receivers
    to: `gonzaruizok@gmail.com`,
    subject: "Hello ✔", // Subject line
    text: "Hello world?", // plain text body
    html: "<b>buenaaas, estoy checkeando la api de envio de mails jajja buen finde chikis</b>", // html body
  };

  const transporter = nodeMailer.createTransport(config);
  const info = await transporter.sendMail(mensaje);
};
enviarMail();

module.exports = {
  enviarMail,
};

const { enviarMail } = require("./apiMailer");

let startLoop = () => {
  alert(`LOOP ACTIVADO`);
  let timerOne, correo;
  if (document.getElementById("intervalPrinted1")) {
    timerOne = parseInt(
      document.getElementById("intervalPrinted1").textContent
    );
    correo = document.getElementById("correoPrinted1").textContent;
  } else {
    console.log("No existe 1");
  }

  function startInterval() {
    var now = new Date().getTime() / 60000;
    var timerFuturo = timerOne + now;

    var x = setInterval(async function () {
      now = new Date().getTime() / 60000; // Actualiza el valor de 'now'
      console.log(now);
      if (now >= timerFuturo) {
        clearInterval(x); // Detener el intervalo
        alert(`Intervalo cumplido al mail ${correo}`);
        // enviarMail(correo);
        await enviarMail();

        // Iniciar el intervalo nuevamente
        startInterval();
      }
    }, 1000); // Actualizar cada segundo
  }

  // Inicia el intervalo
  startInterval();
};

module.exports = { startLoop };

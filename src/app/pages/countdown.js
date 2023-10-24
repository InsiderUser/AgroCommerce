let startLoop = () => {
  // Obtiene elementos del DOM
  alert(`Comienza countdown`);
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

      if (now >= timerFuturo) {
        clearInterval(x); // Detener el intervalo
        alert(`Intervalo cumplido al mail ${correo}`);

        // Realizar una solicitud HTTP POST al servidor para conectarse con la API
        fetch("http://localhost:3000/sendEmail", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ correo }),
        })
          .then((response) => {
            if (response.ok) {
              console.log("Solicitud POST exitosa");
            } else {
              console.error("Error en la solicitud POST");
            }
          })
          .catch((error) => {
            console.error("Error en la solicitud:", error);
          });

        // Iniciar el intervalo nuevamente
        startInterval();
      }
    }, 1000); // Actualizar cada segundo
  }

  // Inicia el intervalo
  startInterval();
};

//codigo original let startLoop = () => {
//   //Obtiene elementos del DOM
//   alert(`Comienza countdown`);
//   let timerOne, correo;
//   if (document.getElementById("intervalPrinted1")) {
//     timerOne = parseInt(
//       document.getElementById("intervalPrinted1").textContent
//     );
//     correo = document.getElementById("correoPrinted1").textContent;
//   } else {
//     console.log("No existe 1");
//   }

//   function startInterval() {
//     var now = new Date().getTime() / 60000;
//     var timerFuturo = timerOne + now;

//     var x = setInterval(async function () {
//       now = new Date().getTime() / 60000; // Actualiza el valor de 'now'

//       if (now >= timerFuturo) {
//         clearInterval(x); // Detener el intervalo
//         alert(`Intervalo cumplido al mail ${correo}`);
//         const { enviarMail } = require("./apiMailer");
//         await enviarMail();

//         // Iniciar el intervalo nuevamente
//         startInterval();
//       }
//     }, 1000); // Actualizar cada segundo
//   }

//   // Inicia el intervalo
//   startInterval();
// };

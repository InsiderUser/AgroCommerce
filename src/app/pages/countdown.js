let startLoop = () => {
  // Obtiene elementos del DOM
  let timerOne, correo, usernameIdentifier, cropClass;
  if (document.getElementById("intervalPrinted1")) {
    timerOne = parseInt(
      document.getElementById("intervalPrinted1").textContent
    );
    correo = document.getElementById("correoPrinted1").textContent;
    usernameIdentifier =
      document.getElementById("usernameIdentifier").textContent;
    cropClass = document.getElementById("cropClass").textContent;
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

        // Realizar una solicitud HTTP POST al servidor para conectarse con la API
        fetch("http://localhost:3000/sendEmail", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ correo, usernameIdentifier, cropClass }),
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

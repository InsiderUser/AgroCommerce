let timerOne;

if (document.getElementById("intervalPrinted1")) {
  timerOne = parseInt(document.getElementById("intervalPrinted1").textContent);
  console.log("existe 1");
} else {
  console.log("error 1");
}

// var countDownDate = new Date("Oct 16, 2023 02:33").getTime(); // Obtener el tiempo en milisegundos

console.log(timerOne);
var x = setInterval(function () {
  var now = new Date().getTime();
  var distance = timerOne - now; // Calcular la diferencia entre el tiempo actual y el tiempo objetivo

  if (distance <= 0) {
    // El tiempo ha llegado o pasado
    clearInterval(x); // Detener el intervalo
    console.log("Es hora de la notificación");
    // Aquí puedes emitir tu notificación
  }
}, 1000); // Actualizar cada segundo

const city = "La Rioja, AR";
var aux = 1;

function consulta(){
  getWeather();
  setInterval(getWeather, 2000);
}

function getWeather() {
    const apiKey = "06c921750b9a82d8f5d1294e1586276f";
    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`;
    console.log("Ciclo");
    fetch(apiUrl)
      .then((response) => {
        if (!response.ok) {
          throw new Error("La solicitud no fue exitosa");
        }
        return response.json();
      })
      .then((data) => {
        const condition = data.weather[0].main;
        const description = data.weather[0].description;
        const temp = Math.round(data.main.temp - 273.15);  
        const titulo = `${condition}`;
        const lugar = `${city}`;
        const temperatura = `${temp}°C`;
        const descripcion = `${description}`;
        const idCondition = data.weather[0].id;
        const iconcode = data.weather[0].icon;
        console.log(iconcode);
        if(idCondition >= 200 && idCondition <=232 && aux===1){
          alert("Atención! Tormenta detectada");
          aux = 0;
        }
        else if(idCondition >= 300 && idCondition <= 321 && aux===1){
          alert("Atención! Llovizna detectada");
          aux = 0;
        }
        else if(idCondition >= 500 && idCondition <= 531 && aux===1){
          alert("Atención! Lluvia intensa detectada");
          aux = 0;
        }

        console.log(idCondition);
        document.getElementById('titulo').textContent = titulo;
        document.getElementById('lugar').textContent = lugar;
        document.getElementById('temp').textContent = temperatura;
        document.getElementById('descripcion').textContent = descripcion;
        document.getElementById('icono').src=`http://openweathermap.org/img/w/${iconcode}.png`;
      })
      .catch((error) => {
        console.error("Ocurrió un error:", error);
        document.getElementById("weatherInfo").textContent =
          "Error al obtener la información del tiempo";
      });
      
  }

  

const cityElement = document.getElementById("provincia_api_0");
let city = cityElement.textContent;

const ciudades = [city];

try {
  const cityElement2 = document.getElementById("provincia_api_1");
  const city2 = cityElement2.textContent
  // Agregar el segundo elemento al arreglo de ciudades
  ciudades.push(city2);
} catch (error) {
  // Manejar el error (en este caso, no hacer nada)
}


console.log(ciudades);

let ciudadActualIndex = 0; // Inicia con la primera ciudad

function consulta() {
  setInterval(() => {
    // Cambia a la siguiente ciudad o vuelve a la primera si ya estás en la última
    ciudadActualIndex = (ciudadActualIndex + 1) % ciudades.length;

    getWeather(ciudades[ciudadActualIndex]);
  }, 8000);

  // Llama getWeather para la primera ciudad inmediatamente
  getWeather(ciudades[ciudadActualIndex]);
}

function getWeather(city) {
  const apiKey = "06c921750b9a82d8f5d1294e1586276f";
  city = city.replace(/\s/g, "&");
  const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city},AR&appid=${apiKey}`;
  console.log(apiUrl);
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
      var titulo = `${condition}`;
      const lugar = `${city}`;
      const temperatura = `${temp}°C`;
      var descripcion = `${description}`;
      const idCondition = data.weather[0].id;
      const iconcode = data.weather[0].icon;
    
      if (titulo === "Clouds") {
        titulo = "Nublado";
      } else if (titulo === "Thunderstorm") {
        titulo = "Tormenta";
      } else if (titulo === "Drizzle") {
        titulo = "Llovizna";
      } else if (titulo === "Rain") {
        titulo = "Lluvia";
      } else if (titulo === "Snow") {
        titulo = "Nevado";
      } else if (titulo === "Clear") {
        titulo = "Despejado";
      }

      if (descripcion === "thunderstorm with light rain") {
        descripcion = "tormenta con lluvia ligera";
      } else if (descripcion === "thunderstorm with rain") {
        descripcion = "tormenta con lluvia";
      } else if (descripcion === "thunderstorm with heavy rain") {
        descripcion = "tormenta con lluvia intensa";
      } else if (descripcion === "light thunderstorm") {
        descripcion = "tormenta ligera";
      } else if (descripcion === "heavy thunderstorm") {
        descripcion = "tormenta intensa";
      } else if (descripcion === "ragged thunderstorm") {
        descripcion = "tormenta irregular";
      } else if (descripcion === "thunderstorm with light drizzle") {
        descripcion = "tormenta con llovizna ligera";
      } else if (descripcion === "thunderstorm with drizzle") {
        descripcion = "tormenta con llovizna";
      } else if (descripcion === "thunderstorm with heavy drizzle") {
        descripcion = "tormenta con llovizna intensa";
      } else if (descripcion === "light intensity drizzle") {
        descripcion = "llovizna de intensidad ligera";
      } else if (descripcion === "drizzle") {
        descripcion = "llovizna";
      } else if (descripcion === "heavy intensity drizzle") {
        descripcion = "llovizna de intensidad intensa";
      } else if (descripcion === "light intensity drizzle rain") {
        descripcion = "llovizna de intensidad ligera con lluvia";
      } else if (descripcion === "drizzle rain") {
        descripcion = "llovizna con lluvia";
      } else if (descripcion === "heavy intensity drizzle rain") {
        descripcion = "llovizna de intensidad intensa con lluvia";
      } else if (descripcion === "shower rain and drizzle") {
        descripcion = "lluvia de aguacero y llovizna";
      } else if (descripcion === "heavy shower rain and drizzle") {
        descripcion = "lluvia de aguacero intensa y llovizna";
      } else if (descripcion === "Drizzle") {
        descripcion = "Llovizna";
      } else if (descripcion === "light rain") {
        descripcion = "lluvia ligera";
      } else if (descripcion === "moderate rain") {
        descripcion = "lluvia moderada";
      } else if (descripcion === "heavy intensity rain") {
        descripcion = "lluvia de intensidad intensa";
      } else if (descripcion === "very heavy rain") {
        descripcion = "lluvia muy intensa";
      } else if (descripcion === "extreme rain") {
        descripcion = "lluvia extrema";
      } else if (descripcion === "freezing rain") {
        descripcion = "lluvia helada";
      } else if (descripcion === "light intensity shower rain") {
        descripcion = "lluvia de aguacero de intensidad ligera";
      } else if (descripcion === "shower rain") {
        descripcion = "lluvia de aguacero";
      } else if (descripcion === "heavy intensity shower rain") {
        descripcion = "lluvia de aguacero de intensidad intensa";
      } else if (descripcion === "clear sky") {
        descripcion = "cielo despejado";
      } else if (descripcion === "few clouds") {
        descripcion = "pocas nubes: 11-25%";
      } else if (descripcion === "scattered clouds") {
        descripcion = "nubes dispersas: 25-50%";
      } else if (descripcion === "broken clouds") {
        descripcion = "nubes rotas: 51-84%";
      } else if (descripcion === "overcast clouds") {
        descripcion = "cielo nublado: 85-100%";
      }
    
      console.log(iconcode);
    
      if (idCondition >= 200 && idCondition <= 232 && aux === 1) {
        alert("Atención! Tormenta detectada");
        aux = 0;
      } else if (idCondition >= 300 && idCondition <= 321 && aux === 1) {
        alert("Atención! Llovizna detectada");
        aux = 0;
      } else if (idCondition >= 500 && idCondition <= 531 && aux === 1) {
        alert("Atención! Lluvia intensa detectada");
        aux = 0;
      }
    
      console.log(idCondition);
    
      document.getElementById("titulo").textContent = titulo;
      document.getElementById("lugar").textContent = lugar;
      document.getElementById("temp").textContent = temperatura;
      document.getElementById("descripcion").textContent = descripcion;
      document.getElementById("icono").src = `http://openweathermap.org/img/w/${iconcode}.png`;
    })
    .catch((error) => {
      console.error("Ocurrió un error:", error);
      // Actualiza la información de error para la ciudad actual
      document.getElementById("weatherInfo").textContent =
        `Error al obtener la información del tiempo para ${city}`;
    });
}
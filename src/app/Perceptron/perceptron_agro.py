from main import Perceptron
import numpy as np
import csv
import psycopg2

# Configura los detalles de la conexión
host = "localhost"
port = "5050"
database = "agrocommercedb"
user = "postgres"
password = "postgres"

# Crea la conexión
conn = psycopg2.connect(
    host=host,
    port=port,
    database=database,
    user=user,
    password=password
)

cur = conn.cursor()

cur.execute("SELECT * FROM perceptron WHERE id = 1")

# Recupera los resultados de la consulta
resultados = cur.fetchall()

# Imprime los resultados
for fila in resultados:
    print(fila)


valores = []
etiquetas = []

cultivo = input("Cultivo: ")

with open("C:/xampp/htdocs/AgroCommerce/src/app/Perceptron/datasets/" + cultivo + "_dataset.csv", newline="") as File:
    reader = csv.reader(File)
    data = list(reader)
    caract = list()

data_values = data[1:]
lista_data_values_int = [
    [float(valor) for valor in sublista] for sublista in data_values
]
lista_data_values_int.pop()
print(lista_data_values_int)
#valores = np.array(lista_data_values_int)

# Define y crea el perceptrón con el número correcto de entradas
perceptron_and = Perceptron(2)

# Entrena el perceptrón con los datos
for _ in range(1000):  # Número de épocas de entrenamiento
    for i in range(len(valores)):
        entradas = valores[i, 0:2]
        salida_deseada = valores[i, 2]
        perceptron_and.propagacion(entradas)
        perceptron_and.actualizacion_coef(0.1, salida_deseada)

ph = float(input("Ingrese el pH del suelo: "))
humedad = int(input("Ingrese la humedad en porcentaje: "))

perceptron_and.propagacion(np.array([ph, humedad]))
resultado = perceptron_and.salida
valores = np.append(valores, [ph, humedad, resultado])
print("Resultado:", resultado)

# Abrir el archivo CSV en modo de escritura
#with open("C:/xampp/htdocs/AgroCommerce/src/app/Perceptron/datasets/" + cultivo + "_dataset.csv", mode="a", newline="") as File:
#    escritor_csv = csv.writer(File)
#    # Escribe el nuevo elemento en una fila separada
#    escritor_csv.writerow([ph, humedad, resultado])

#print("Nuevo valor agregado al archivo CSV.")
res = int(resultado)
sql = "UPDATE perceptron SET valores = %s WHERE id = 1"
cur.execute(sql, (res,))
conn.commit()


# Realiza una consulta SELECT para mostrar los cambios
sql_select = "SELECT * FROM perceptron WHERE id = 1"

# Ejecuta la consulta SELECT
cur.execute(sql_select)

# Recupera los resultados de la consulta
resultado = cur.fetchone()

# Imprime los resultados
print(resultado)

cur.close()
conn.close()
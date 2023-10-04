<?php
    include "../backend/conection.php";
    $perceptron = pg_query($conectado,'SELECT valores FROM perceptron WHERE id = 1;');
    if ($perceptron) {
        $fila = pg_fetch_assoc($perceptron); // Obtiene la fila como un arreglo asociativo
        if ($fila) {
            // Accede a los datos individuales en el arreglo asociativo
            $nombre_de_la_columna = $fila['valores'];
            // Muestra los datos o haz lo que necesites con ellos
            echo "Resultado: " .$nombre_de_la_columna;
        } else {
            echo "No se encontraron resultados.";
        }
    } else {
        echo "Error en la consulta: " . pg_last_error($conexion);
    }
?>
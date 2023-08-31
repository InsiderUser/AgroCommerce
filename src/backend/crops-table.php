<?php
                  
    include "conexion.php";
    

    $opcion = $_REQUEST['cultivo'];
    $anio = $_REQUEST['anio'];
    $provincia = $_REQUEST['provincia'];

    if($opcion=='null'){
    echo "Selecciona un cultivo";
    }
    else{
    $query = "SELECT * from cultivos where cultivo_nombre = '$opcion' and anio='$anio' and provincia_nombre= '$provincia'";

    $result = pg_query($conectado, $query);
    if (!$result) {
        echo "Error en la consulta.";
        exit;
    }

        
        echo "<br><h4>Cultivo: $opcion</h4>";
        echo "<h4>Provincia: $provincia</h4>";
        echo "<h4>Año: $anio</h4><br>";
        
        $sumaTotal1 = 0;
        $sumaTotal2 = 0;
        $sumaTotal3 = 0;
        $sumaTotal4 = 0;
        
        $contador = 0;
        
        while ($row = pg_fetch_assoc($result)) {
        // Obtener el valor de la columna y sumarlo
        $valorColumna_Superficie_Sembrada = (int)$row['superficie_sembrada_ha'];
        $valorColumna_Superficie_Cosechada = (int)$row['superficie_cosechada_ha'];
        $valorColumna_Produccion_Tonelada_Metro = (int)$row['produccion_tm'];
        $valorColumna_Rendimiento_Economico_kg_metro = (int)$row['rendimiento_kgxha'];
        
        
        $sumaTotal1 += $valorColumna_Superficie_Sembrada;
        $sumaTotal2 += $valorColumna_Superficie_Cosechada;
        $sumaTotal3 += $valorColumna_Produccion_Tonelada_Metro;
        $sumaTotal4 += $valorColumna_Rendimiento_Economico_kg_metro;
        $contador++;
        
        } 

        $valor1 = number_format(($sumaTotal1/($contador-1)), 2);
        $valor2 = number_format(($sumaTotal2/($contador-1)), 2);

        echo "<div class='muestra'>";
        echo "<div class='single'>Promedio de Superficie Sembrada por Hectarea: " .$valor1."</div>";
        echo "<div class='single'>Promedio de Superficie Cosechada por Hectarea: " .$valor2."</div>";
        echo "<div class='single'>Promedio de Produccion Tonelada/metro: " .number_format(($sumaTotal3/($contador-1)), 2)."</div>";
        echo "<div class='single'>Promedio de Rendimiento Economico kg/m: " .number_format(($sumaTotal4/($contador-1)), 2)."</div>";
        echo "</div>";
        

        echo "<table class='table table-hover'>";
        echo "<tr class='table-info'><th>Departamento</th><th>Superficie Sembrada/hec</th><th>Superficie cosechada/hec</th><th>Produccion T/metro</th><th>Rendimiento kg/m</th><th>Temperatura ideal(grados)</th><th>Tiempo de cosecha</th></tr>";
        while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['departamento_nombre'] . "</td>";
        echo "<td>" . $row['superficie_sembrada_ha'] . "</td>";
        echo "<td>" . $row['superficie_cosechada_ha'] . "</td>";
        echo "<td>" . $row['produccion_tm'] . "</td>";
        echo "<td>$" . $row['rendimiento_kgxha'] . "</td>";
        echo "<td>" . $row['temp_ideal'] . "°</td>";
        echo "<td>" . $row['tiempo_cosecha_max'] ." días</td>";
        echo "</tr>";
        }
        
        echo "</table>";
        
        pg_close($conectado);
    }
?>
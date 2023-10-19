<html>
    <body>
        <?php
            // PUERTOS 5432 O 5050
            $host = "localhost";
            $port = "5050";
            $user = "postgres";
            $pass = "postgres";
            $dbname = "agrocommercedb";

            $conectado = pg_connect("host=$host port=$port user=$user password=$pass dbname=$dbname");

        ?>
    </body>
</html>
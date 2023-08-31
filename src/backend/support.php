<?php
$host = "localhost";
$port = "5432";
$user = "postgres";
$pass = "postgres";
$dbname = "agrocommercedb";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mensaje = $_POST['mensaje'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        // Guardar el mensaje en la base de datos
        $stmt = $pdo->prepare("INSERT INTO mensajes (mensaje, nombre, email) VALUES (?, ?, ?)");
        $stmt->execute([$mensaje, $nombre, $email]);

        echo "Mensaje guardado correctamente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<?php
include "conection.php";
$userId = $_SESSION['user_id'];
$pg = pg_query($conectado,"SELECT image_location FROM clientes WHERE id = '$userId'");
$pg = pg_fetch_assoc($pg);

echo("<img src=\"../".$pg['image_location']."\">");


?>

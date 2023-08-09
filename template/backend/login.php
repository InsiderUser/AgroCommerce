   <?php
    include "conection.php";
//    $flag = false;
    //Obtener user/pass del form y parsing a minuscula
    $username = $_POST['webUser'];
    $password = $_POST['webPass'];

    
    $input = pg_query($conectado,"SELECT usuario,clave FROM clientes WHERE usuario='$username'");
    $input = pg_fetch_assoc($input);
    
    if($input && $input['usuario']==$username && $input['clave']==$password){
        header('Location: http://localhost/agrocommerce/template/index.html');
        exit();
    }else{
        $error = true;
        header('Location: http://localhost/agrocommerce/template/pages/samples/login.html');
        exit();
        ## BUG
        ## Deberia mostrar un modal durante unos segundos indicando que hay errores en las credenciales de acceso
    }
    ?>

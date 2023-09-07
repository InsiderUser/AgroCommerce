   <?php
    include "conection.php";
   $flag = false;
    //Obtener user/pass del form y parsing a minuscula
    $username = $_POST['webUser'];
    $password = $_POST['webPass'];

   if(strpos($username,'@') == true){
    $input = pg_query($conectado,"SELECT correo,clave FROM clientes WHERE correo='$username'");
    $flag = true;
   }else{
    $input = pg_query($conectado,"SELECT usuario,clave FROM clientes WHERE usuario='$username'"); 
    $flag = false; 
   }
    
    $input = pg_fetch_assoc($input);
    
    if($input && $input['usuario']==$username && $input['clave']==$password && $flag == false){
        header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
        
        exit();
    }elseif($input && $input['correo']==$username && $input['clave']==$password && $flag == true){
        header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
        exit();
    }else{
        $error = true;
        header('Location: http://localhost/agrocommerce/src/app/pages/account/login.html');
        exit();
    }
    ?>

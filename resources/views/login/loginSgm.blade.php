<?php 
    // session_start();
    // include_once './conexion/database.php';
    $message="";
    // if (isset($_POST['user']) && isset($_POST['pass'])){
    //     $user=isset($_POST['user']) ? $_POST['user'] : "";
    //     $pass=isset($_POST['pass']) ? $_POST['pass'] : "";

    //     $db= new Database();
    //     $query=$db->connect()->prepare('SELECT * FROM usuarios WHERE rut=:rut AND clave=:clave');
    //     $query->execute(['rut'=>$user,'clave'=>$pass]);
    //     $row=$query->fetch(PDO::FETCH_ASSOC);

    //     if($row==true){
    //         $rut=$row['rut'];
    //          $nombre=$row['nombre'];
    //          $rol=$row['rol'];
    //          $_SESSION['rol']=$rol;
    //          $_SESSION['rut']=$rut;
    //          $_SESSION['user']=$nombre;
    //          header('location:./vistas/template.php');
    //      }else{
    //          $message="Rut o clave inválidos.";
    //      }
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGM - Login </title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center mx-auto">
            <div class="col mx-auto">
                <div class="login-wrap">
                    <div class="login-html row justify-content-center">
                        <div class="text-warning text-center"><h2>Zona Usuarios</h2></div>

                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab w-100">Iniciar Sesion</label>
                        <input disabled id="tab-2" hidden type="radio" name="tab" class="sign-up"><label disabled for="tab-2" class="tab"></label>
                        <div class="login-form">
                            <div class="sign-in-htm">
                                <form action="" method="POST">
                                    <div class="group">
                                        <label for="user" class="label">Rut Usuario</label>
                                        <input name="user" type="text" class="input" required>
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Clave</label>
                                        <input name="pass" type="password" class="input" data-type="password" required>
                                    </div>
                                    
                                    <div class="group">
                                        <input type="submit" class="button" value="Ingresar">
                                    </div>
                                    <div class="group text-center">
                                        
                                        <a href="{{route('login.portalSgm')}}" class="text-warning">Volver</a>
                                    </div>
                                    <div class="hr"></div>
                                    <h4 style="color:yellow;"><?php echo $message;?></h4>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
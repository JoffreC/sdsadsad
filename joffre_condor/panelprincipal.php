<?php
    session_start();
    $nombre=$_POST["nombre"];
    $clave=$_POST["clave"];
    $guardarPreferencias=(isset($_POST["chkrecordarme"]))?$_POST["chkrecordarme"]:"";
    if($guardarPreferencias){
        $chk=$_POST["chkrecordarme"];
    }
    if(isset($_POST["nombre"])&&isset($_POST["clave"])){
        $_SESSION["s_nombre"] = $_POST["nombre"];
        $_SESSION["s_clave"] = $_POST["clave"];
    }
    if(!isset($_SESSION["s_nombre"]) && !isset($_SESSION["s_clave"])){
        header("Location: index.php");
    }

    if($guardarPreferencias!=""){
        setcookie("c_nombre",$nombre,time()+(60*60*24));
        setcookie("c_clave", $clave, time()+(60*60*24));
        setcookie("c_preferencias", $guardarPreferencias, time()+(60*60*24));
    }
    if($guardarPreferencias==""&&isset($_SESSION["s_nombre"])&& isset($_SESSION["s_clave"])){
        setcookie("c_nombre","");
        setcookie("c_clave", "");
        setcookie("c_preferencias", "");
        setcookie("c_lenguaje","");
    }
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <h2>Bienvenido usuario: <?php echo $_POST["nombre"];?></h2><br/>
        <a href="panelprincipal_es.php?language=1&nombre=<?php echo $nombre ?><?php if($guardarPreferencias){echo "&chk=", $chk;} ?>" >ES (Español) </a> <?php echo"|"; ?> <a href="panelprincipal_en.php?language=2&nombre=<?php echo $nombre ?><?php if($guardarPreferencias){echo "&chk=", $chk;}?>">EN (English)</a><br/>
        <a href="cerrarsesion.php">Cerrar sesion </a><br/>
</body>
</html>

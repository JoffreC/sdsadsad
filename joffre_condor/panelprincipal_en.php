<?php
    session_start();
    $nombre="";
    if(!isset($_SESSION["s_nombre"]) && !isset($_SESSION["s_clave"])){
        header("Location: index.php");
    }
    if($_GET){
        setcookie("c_lenguaje",$_GET["language"],(60*60*24));
        $nombre=$_GET["nombre"];
        $chk1=$_GET["chk"];
    }
    if($_POST){
        $nombre=$_POST["nombre"];
        $clave=$_POST["clave"];
        $chk1=$_POST["chkrecordarme"];
    }
    $guardarPreferencias=$chk1;
    if($_POST){
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
    }
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <h2>Bienvenido usuario: <?php echo $nombre;?></h2><br/>
        <a href="panelprincipal_es.php?language=1&nombre=<?php echo $nombre?>&chk=<?php echo $chk1 ?>" >ES (Español) </a> <?php echo"|"; ?> <a href="panelprincipal_en.php?language=2&nombre=<?php echo $nombre?>&chk=<?php echo $chk1 ?>">EN (English)</a><br/>
        <a href="cerrarsesion.php">Cerrar sesion </a><br/>
        <h3>  Product List </h3> 
        <?php
            $archivo = fopen('categorias_en.txt','r');
            while ($linea = fgets($archivo)) {
            echo $linea.'<br/>';
            }
            fclose($archivo);

        ?>
    </body>
</html>
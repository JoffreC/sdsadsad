<?php
$recordar=false;
$nombre="";
$clave="";
$preferencias=false;
if(isset($_COOKIE["c_preferencias"])&& $_COOKIE["c_preferencias"]!=""){
    $preferencias=true;
    $nombre=isset($_COOKIE["c_nombre"])?$_COOKIE["c_nombre"]:"";
    $clave=isset($_COOKIE["c_clave"])?$_COOKIE["c_clave"]:"";  
}
$lenguaje="";
if(isset($_COOKIE["c_lenguaje"])){ 
$lenguaje=$_COOKIE["c_lenguaje"];
}
$refe="";
if($lenguaje==""){
    $refe="panelprincipal.php";
}
if($lenguaje==1){
    $refe="panelprincipal_es.php";
}if($lenguaje==2){
    $refe="panelprincipal_en.php";
}

?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>LOGIN</h1>
            <form method="POST" action="<?php echo $refe ?>">
                <fieldset>
                    Nombre*:<br> 
                    <input type="text" name="nombre"  value="<?php echo $nombre; ?>"required/><br>
                    Clave*:<br> <input type="password" name="clave" value="<?php echo $clave;?>"required/><br>
                <input type="checkbox" name="chkrecordarme"<?php echo ($preferencias)?"checked":""?>/>Recordarme<br/>
                <input type="submit" name="enviar" value="Enviar"/><br/>
</fieldset>
</form>
    </body>
</html>
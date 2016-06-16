<?php
@$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
session_start();

if(!$_SESSION){
	header("location:login.php");
}
$id_alumnos =$_SESSION['id_alumnos'];
$consulta= "SELECT idalumno,nombre, matricula, appaterno,apmaterno, carreras.carrera, password FROM alumnos inner join carreras on alumnos.idcarrera = carreras.idcarrera WHERE idalumno='$id_alumnos'";
$resultado=mysql_query($consulta,$conex) or die (mysql_error());
$resultado_obtenido= mysql_fetch_array($resultado);
$idalumno = $resultado_obtenido['idalumno'];
$nombre = $resultado_obtenido['nombre'];
$matricula = $resultado_obtenido['matricula'];
$appaterno = $resultado_obtenido['appaterno'];
$apmaterno = $resultado_obtenido['apmaterno'];
$carrera = $resultado_obtenido['carrera'];
$password = $resultado_obtenido['password'];
?>
<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<script type="text/javascript" src="js/cambiarPestanna.js"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <title>SRACTyOE</title>
    </head>
    <body>
 	
	     
	  <div class="contenedor">
            <div>
            <center>
            <table width="1020" >
  <tr>
    <td width="30"><img src="imagenes/logoITC.png"  ></td>
    <td width="878"><center><h1>Instituto Tecnologico de Campeche</h1>    <h2>Sistema de Registro de Actividades Complementarias de Tutorias y Orientación Educativa</h2></center>
    </td>
    <td width="30" align="right"><img src="imagenes/logo-tec.png" ></td>
  </tr>
</table>

            </center>
			<center><h2>Bienvenido</h2>
      <table width="1020" align="center">
  <tr align="center">
  </tr>
  <tr>
  <script>
var barra_progreso = document.getElementById('barra_progreso');
var actualizar_progreso = function(valor) {
  barra_progreso.value = valor;
  barra_progreso.getElementsByClassName('prueba').innerHTML = Math.floor((100 / 20) * value);
}    
	</script> 
<td width="210"> 
 <span ></span> %
<progress id="barra_progreso" max='20' value="14" >
</progress>


</td> 
    <td align="center" width="600">
<h2><span><strong><?php echo $matricula;?> </strong></span></h2>
 <h2><span><strong>
 <?php echo $nombre;?> 
 <?php echo $appaterno;?>
 <?php echo $apmaterno;?> </strong></span></h2>  
<h2><span><strong><?php echo $carrera;?> </strong></span></h2>
    </td>
    <td width="210" align="right"><strong><p align="right"><a href="logout.php" style="border-bottom:solid">Cerrar Sesión</a> </p></strong>   
</td>
  </tr>
</table>
      
    </center> 
			   
			</div>
            <div id="pestanas">
                <ul id=lista>
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Actividades</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Kardex de Actividades</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Cambiar Contraseña</a></li>
                    
                </ul>
            </div>
            
<body onload="javascript:cambiarPestanna(pestanas,pestana1);">
       
            <div id="contenidopestanas">
                <div id="cpestana1">

    <fieldset style="border:2px solid #F60; width:950px">
    <legend>Realizar Solicitud </legend>
    <section align="center"  > 
<form name="aluact" method="POST" action="../Departamento Academico/Datos/Alumnos_Actividad/register.php">

<table width="250" align="center">
<center>
  <tr>
    <td colspan="2" align="center">
           <?php include('select/actividad.php') ?>
     <select name="actividad_idactividad">
     <option >
  Seleccione la actividad a asistir..............
     </option> 
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
<option value="<?php echo $pe['idactividad']?>">
	 <?php echo $pe['nombact']?>
</option>
     <?php } ?>
     </select> 
    </td>
    </tr>
  <tr>
    <td colspan="2" align="center">
    
 <select name="alumnos_idalumno" size="0" > 
    
<option value="<?php echo $idalumno ?>">  
 <?php echo $appaterno;?>
 <?php echo $apmaterno;?>
 <?php echo $nombre;?>
 </option>
 </select>
 </td></tr></center>
    
    
  <tr>
    <td align="right">
    
    <input type="submit" name="register" id="register" style="background-color:#FF0" width="100" height="80" value="Guardar">
   
    </td>
    <td align="left">
   
    <input type="reset" name="borrar"  value="Borrar" style="background-color:#FF0" width="100" height="80">
    
    </td>
  </tr>
</table>

</form>
     </section>
   </fieldset>
   
   <fieldset style="border:2px solid #F60; width:950px">
    <legend>Consulta de Actividades </legend>
  <section align="center"  >
      <form>
      <table width="800" border="1" align="center">
  <tr>
    <td rowspan="2">
    <label>Actividades </label><br>
     <?php include('select/actividad.php') ?>
    
      <select name="idactividad" size="0" >
       <option >
     -------------------------------
     SIN ASIGNAR
     -------------------------------
     </option>
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
     <option value="<?php echo $pe['idactividad']?>">
	 <?php echo $pe['nombact']?>
     </option>
     <?php } ?>
     </select> 
    </td>
    
    <td>
<input type="text" name="totalh" value="<?php echo $pe['institucion']?>">
    </td>
  </tr>
  <tr>
    <td>
<input type="text" name="totalh" value="<?php echo $pe['totalh']?>">
    </td>
  </tr>
</table>
       
      <br><br>
      
    </form>
    </fieldset>
  </section>
             
				</div>
    
                <div id="cpestana2">
                   <form>
  <center>
<table border="4" >
<thead>
 <tr>
 <td><b><center>Areá Comisionada</center></b></td>
 <td><b><center>Representante del Areá</center></b></td>
   <td><b><center>Tipo de Actividad</center></b></td>
   <td><b><center>Nombre de la Actividad</center></b></td>
   <td><b><center>Ponente</center></b></td>
   <td><b><center>Fecha realizada</center></b></td>
   <td><b><center>Horas asignadas</center></b></td>
 </tr>

<tr>
<?php
include ('includes/conex.php');
?>
<?php
$consulta_mysql="select tipoact, nombact, ponente, fecha, totalh from kardex where idalumno='$id_alumnos '";
$result_consulta_mysql=mysql_query($consulta_mysql,$con);
while($row = mysql_fetch_array($result_consulta_mysql)){?>
<td></td>
<td></td>
<td><?php echo $row['tipoact'] ?></td>
<td><?php echo $row['nombact'] ?></td>
<td><?php echo $row['ponente'] ?> </td>
<td><center><?php echo $row['fecha'] ?></center> </td>
<td><center><?php echo $row['totalh'] .'  horas' ?></center> </td>
</tr>

	<?php
    }
    ?>
</thead>
</table>
<center>
<input type="submit" name="imprimir" formaction="../Departamento Academico/Datos/formatos/pdfkardex.php" value="Imprimir a PDF">
</center>
         </form>          
                </div>
                
                <div id="cpestana3">
<center>
        <?php
        if(isset($_SESSION['id_alumnos'])) { // comprobamos que la sesión esté iniciada
  if(isset($_POST['enviar'])) {
	  if($_POST['password'] != $_POST['password_conf']) {
                    echo' 
			<script>
window.alert("LAS CONTRASEÑAS NO COINCIDEN, INTENTE DE NUEVO POR FAVOR");
window.location="menu.php";
</script>';
                }else {
                    $id_alumnos = $_SESSION['id_alumnos'];
 $password = mysql_real_escape_string($_POST["password"]);
                  // $password = md5($password);   encriptamos la nueva contraseña con md5
                    $sql = mysql_query("UPDATE alumnos SET password='".$password."' WHERE idalumno='$id_alumnos'
					");
                    if($sql) {
                      echo '<script> 
window.alert("DATOS INGRESADOS CORRECTAMENTE");
window.location="menu.php";
</script>';
                    }else {
                        echo '
						<script>
window.alert("ERROR, NO SE PUEDE CAMBIAR A CONTRASEÑA");
window.location="menu.php";
</script>';
                    }
                }
            }else {
    ?>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <label>Su contraseña Actual es:</label><br /><br />
                <label><?php echo $password ?></label><br />
  <br />       <label>Nueva contraseña:</label><br />
  <input type="password" name="password" maxlength="15" required /><br />
         <br />       <label>Confirmar:</label><br />
             <input type="password" name="password_conf" maxlength="15" /><br />
     <br />           <input type="submit" name="enviar" value="Enviar" required/>
            </form>
    <?php
            }
        }else {
            echo "Acceso denegado.";
        }
    ?> 

</center>        
	              </div>
               
              </div>
        </div>
    </body>
	
	<?php include("includes/footer.php"); ?>
    
<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

</html>

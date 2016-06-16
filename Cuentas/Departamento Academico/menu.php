<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
session_start();

if(!$_SESSION){
	header("location:login.php");
}
$id_deptoacad =$_SESSION['id_deptoacad'];
$consulta= "SELECT iddeptoacad, nombrec,cargo, password FROM deptoacad WHERE iddeptoacad='$id_deptoacad'";
$resultado=mysql_query($consulta,$conex) or die (mysql_error());
$resultado_obtenido= mysql_fetch_array($resultado);
$iddeptoacad = $resultado_obtenido['iddeptoacad'];
$nombrec = $resultado_obtenido['nombrec'];
$cargo = $resultado_obtenido['cargo'];
$password = $resultado_obtenido['password'];

?>

<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <script type="text/javascript" src="js/cambiarPestanna.js"></script>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <title>
         
        </title>
    </head>
   <body id="fondo">
 	
	     
	  <div class="contenedor">
            <div>
            <center>
            <table width="1020" >
  <tr>
    <td width="30"><img src="imagenes/logoITC.png"  ></td>
    <td width="878"><center><h1>Instituto Tecnologico de Campeche</h1>    <h2>Sistema de Registro de Actividades Complementarias de Tutorias y Orientación Academica</h2></center>
    </td>
    <td width="30" align="right"><img src="imagenes/logo-tec.png" ></td>
  </tr>
</table>
            </center>
            
			<center><h2>Bienvenido</h2>
            <table width="1020" align="center">
  <tr>
    <td width="210">&nbsp;</td>
    <td align="center" width="600">
<h2><span><strong><?php echo utf8_encode($nombrec);?> </strong></span></h2>
<h2><span><strong><?php echo $cargo;?> </strong></span></h2>
    </td>
    <td width="210" align="right"><strong><p align="right"><a href="logout.php">Cerrar Sesión</a> </p></strong>   
</td>
  </tr>
</table>


    </center> 
			</div>
            
            <div id="pestanas">
                <ul id=lista>
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Tutorias</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>O.Educativa</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Altas</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>Modificación</a></li>
                    <li id="pestana5"><a href='javascript:cambiarPestanna(pestanas,pestana5);'>Bajas</a></li>
                    <li id="pestana6"><a href='javascript:cambiarPestanna(pestanas,pestana6);'>Cambiar Contraseña</a></li>
          
                                   
                </ul>
            </div>
            
            <body onload="javascript:cambiarPestanna(pestanas,pestana1);">
       
            <div id="contenidopestanas">
                <div id="cpestana1">
                      <form>
  <center>
<table border="4" >
<thead>
 <tr>
 <td><b><center>Responsable de Areá</center></b></td>
 <td><b><center>Tipo de Actividad</center></b></td>
   <td><b><center>Nombre de la Actividad</center></b></td>
   <td><b><center>Ponente</center></b></td>
   <td><b><center>Fecha realizada</center></b></td>
   <td><b><center>  Imprimir  </center></b></td>
 </tr>

<tr>
<?php
include ('includes/conex.php');
?>
<?php
$consulta_mysql="select idactividad,area,tipoact, nombact, ponente, fecha from actividad where area = 'TUTORIAS'  order by fecha desc";
$result_consulta_mysql=mysql_query($consulta_mysql,$con);
while($row = mysql_fetch_array($result_consulta_mysql)){?>
<td>  </td>
<td><?php echo $row['tipoact'] ?></td>
<td><?php echo $row['nombact'] ?></td>
<td><?php echo $row['ponente'] ?></td>
<td><?php echo $row['fecha'] ?> </td>
<td><?php echo ' <input type="submit" name="imprimir" formaction="Datos/formatos/asistencia_lista.php" value="Imprimir a PDF"> ' ?> 
</td>
	 </tr>
	<?php
    }
    ?>
   
</thead>
</table>
</center>
         </form>    
				</div>
                
              <div id="cpestana2">
        <form>
  <center>
<table border="4" >
<thead>
 <tr>
 <td><b><center>Responsable de Areá</center></b></td>
    <td><b><center>Tipo de Actividad</center></b></td>
   <td><b><center>Nombre de la Actividad</center></b></td>
   <td><b><center>Ponente</center></b></td>
   <td><b><center>Fecha realizada</center></b></td>
   <td><b><center>  Imprimir  </center></b></td>
 </tr>

<tr>
<?php
include ('includes/conex.php');
?>
<?php
$consulta_mysql="select idactividad,area,tipoact, nombact, ponente, fecha from actividad  where area = 'ORIENTACION EDUCATIVA' order by fecha desc";
$result_consulta_mysql=mysql_query($consulta_mysql,$con);
while($row = mysql_fetch_array($result_consulta_mysql)){?>
<td></td>
<td><?php echo $row['tipoact'] ?></td>
<td><?php echo $row['nombact'] ?></td>
<td><?php echo $row['ponente'] ?></td>
<td><?php echo $row['fecha'] ?> </td>
<td><?php echo ' <input type="submit" name="imprimir" formaction="Datos/formatos/asistencia_lista.php" value="Imprimir a PDF"> ' ?> 
</td>
	 </tr>
	<?php
    }
    ?>
   
</thead>
</table>
</center>
         </form>    
				</div>
                
                <div id="cpestana3">

        <script>
		$(document).ready(function(e) {
            $("#pulsar").click(function(e){
				e.preventDefault(); 
$("#externo").attr("src","Datos/Actividades/formregac.php");
		 });
		   $("#pulsar1").click(function(e){
				e.preventDefault(); 
$("#externo").attr("src","Datos/Carreras/formregc.php");
		 });
		 $("#pulsar2").click(function(e){
				e.preventDefault(); 
$("#externo").attr("src","Datos/Departamento/formregdepto.php");
		 });
		 $("#pulsar3").click(function(e){
				e.preventDefault(); 
$("#externo").attr("src","Datos/Departamento Academico/formregdeptoac.php");
		 });
		 $("#pulsar4").click(function(e){
				e.preventDefault(); 
$("#externo").attr("src","Datos/Jefes Academicos/formregjefea.php");
		 });
		 $("#pulsar5").click(function(e){
				e.preventDefault(); 
$("#externo").attr("src","Datos/DeptoServEsc/formregdse.php");
		 });
		 $("#pulsar6").click(function(e){
				e.preventDefault(); 
$("#externo").attr("src","Datos/Periodo Escolar/formregperiodo.php");
		 });
		});
		</script>
                <h3 align="center">
                Seleccione el registro que desea realizar
                </h3>
               <form> 

 <table  border="1"  align="left">
  <tr>
 <td><input type="button"  src="" id="pulsar" value="Actividades" /></td>
  </tr>
  <tr>
    <td><input type="button"  src="" id="pulsar1" value="Carreras" /></td>
  </tr>
 <!-- <tr>
    <td><input type="button"  src="" id="pulsar2" value="Departamento" /></td>
  </tr>-->
  <tr>
    <td><input type="button"  src="" id="pulsar3" value="Desarrollo Academico" /></td>
  </tr>
  <!--<tr>
    <td><input type="button"  src="" id="pulsar4"  value="Jefes Academicos" /></td>
  </tr>-->
  <tr>
    <td><input type="button"  src="" id="pulsar5"  value="Depto. de Serv. Escolares" /></td>
  </tr>
  <tr>
    <td><input type="button"  src="" id="pulsar6"  value="Periodo Escolar" /></td>
  </tr>
  
</table>
    
              
 <section align="center" id="mostrar" style=" width:700; height:400; margin:auto">
 <iframe src="" width="800" height="400" id="externo" frameborder="0"></iframe>
 </section>
                </form> 
                </div>
                
                <div id="cpestana4">
   ESPACIO PARA MODIFICAR
	              </div>
                  
                   <div id="cpestana5">
        <form>
   ESPACIO PARA ELIMINAR
         </form>        
	              </div>
                  
                <div id="cpestana6">
<center>
        <?php
        if(isset($_SESSION['id_deptoacad'])) { // comprobamos que la sesión esté iniciada
  if(isset($_POST['enviar'])) {
  if($_POST['password'] != $_POST['clave_conf']) {
                    echo' 
			<script>
window.alert("LAS CONTRASEÑAS NO COINCIDEN, INTENTE DE NUEVO POR FAVOR");
window.location="menu.php";
</script>';
                }else {
                    $id_deptoacad = $_SESSION['id_deptoacad'];
 $password = mysql_real_escape_string($_POST["password"]);
                  // $password = md5($password);   encriptamos la nueva contraseña con md5
                    $sql = mysql_query("UPDATE deptoacad SET password='".$password."' WHERE iddeptoacad='$id_deptoacad'
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
             <input type="password" name="clave_conf" maxlength="15" /><br />
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
	

</html>
